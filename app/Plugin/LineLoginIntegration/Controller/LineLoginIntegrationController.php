<?php

namespace Plugin\LineLoginIntegration\Controller;

use Eccube\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Eccube\Controller\AbstractController;
use Plugin\LineLoginIntegration\Entity\LineLoginIntegration;
use Plugin\LineLoginIntegration\Controller\Admin\LineLoginIntegrationAdminController;

class LineLoginIntegrationController extends AbstractController
{

    private $lineChannelId;
    private $lineChannelSecret;

    const PLUGIN_LINE_LOGIN_INTEGRATION_SSO_USERID = 'plugin.line_login_integration.sso.userid';
    const PLUGIN_LINE_LOGIN_INTEGRATION_SSO_STATE = 'plugin.line_login_integration.sso.state';

    public function __construct()
    {
        $lineLoginIntegrationSetting = $this->getLineLoginIntegrationSetting();
        $this->lineChannelId = $lineLoginIntegrationSetting->getLineChannelId();
        $this->lineChannelSecret = $lineLoginIntegrationSetting->getLineChannelSecret();
    }

    /**
     * ログイン画面を表示します
     * @param Application $app
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login(Application $app, Request $request)
    {
        $state = uniqid();
        $session = $request->getSession();
        $session->set(self::PLUGIN_LINE_LOGIN_INTEGRATION_SSO_STATE, $state);
        // bot_prompt
        // bot_prompt=normal or aggressive
        // https://developers.line.me/ja/docs/line-login/web/link-a-bot/
        $lineAuthUrl = 'https://access.line.me/oauth2/v2.1/authorize?response_type=code&client_id=' . $this->lineChannelId . '&redirect_uri=' . rawurlencode($app->url('plugin_line_login_callback')) . '&state=' . $state . '&scope=profile&bot_prompt=aggressive';
        return $app->redirect($lineAuthUrl);
    }

    /**
     * ログインのコールバック処理をおこないます。
     * @param Application $app
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function loginCallback(Application $app, Request $request)
    {
        $code = $request->get('code');

        $session = $request->getSession();
        $originalState = $session->get(self::PLUGIN_LINE_LOGIN_INTEGRATION_SSO_STATE);
        $state = $request->get('state');

        $session->remove(self::PLUGIN_LINE_LOGIN_INTEGRATION_SSO_STATE);

        if (empty($state)) {
            log_error('LINE API エラー(1)');
            return $app->render('LineLoginIntegration/Resource/template/admin/error.twig');
        }
        if (empty($originalState)) {
            log_error('LINE API エラー(2)');
            return $app->render('LineLoginIntegration/Resource/template/admin/error.twig');
        }
        if ($state != $originalState) {
            log_error('LINE API エラー(3)');
            return $app->render('LineLoginIntegration/Resource/template/admin/error.twig');
        }

        $accessTokenUrl = "https://api.line.me/oauth2/v2.1/token";
        $accessTokenData = array(
            "grant_type" => "authorization_code",
            "code" => $code,
            "redirect_uri" => $app->url('plugin_line_login_callback'),
            "client_id" => $this->lineChannelId,
            "client_secret" => $this->lineChannelSecret,
        );
        $accessTokenData = http_build_query($accessTokenData, "", "&");
        $header = array(
            "Content-Type: application/x-www-form-urlencoded",
            "Content-Length: " . strlen($accessTokenData)
        );
        $context = array(
            "http" => array(
                "method" => "POST",
                "header" => implode("\r\n", $header),
                "content" => $accessTokenData
            )
        );

        $res = file_get_contents($accessTokenUrl, false, stream_context_create($context));
        $tokenJson = json_decode($res, true);
        if (isset($token['error'])) {
            log_error('LINE API エラー(4)' . $tokenJson['error'] . ' ' . $tokenJson['error_description']);
            return $app->render('LineLoginIntegration/Resource/template/admin/error.twig');
        }

        if (!array_key_exists("access_token", $tokenJson)) {
            log_error('LINE API エラー(5)');
        }

        $accessToken = $tokenJson['access_token'];
        $lineProfileUrl = "https://api.line.me/v2/profile";
        $context = array(
            "http" => array(
                "method" => "GET",
                "header" => "Authorization: Bearer " . $accessToken
            )
        );

        $res = file_get_contents($lineProfileUrl, false, stream_context_create($context));
        $profileJson = json_decode($res, true);
        if (!array_key_exists("userId", $profileJson)) {
            log_error('LINE API エラー(6)');
        }

        $lineUserId = $profileJson['userId'];
        if (empty($lineUserId)) {
            log_error('LINE API エラー(7)');
        }

        $session->set(self::PLUGIN_LINE_LOGIN_INTEGRATION_SSO_USERID, $lineUserId);

        $app['eccube.repository.customer']->findAll();

        $customer = null;

        // 連携テーブルのLINE IDからCustomerを取得
        $lineLoginIntegrationRepository = $app['eccube.plugin.line_login_integration.repository.line_login_integration'];
        $lineLoginIntegration = $lineLoginIntegrationRepository->findOneBy(array('line_user_id' => $lineUserId));
        $customer = null;
        if (!is_null($lineLoginIntegration)) {
            $customerRepository = $app['eccube.repository.customer'];
            $customerId = $lineLoginIntegration['customer_id'];
            $customer = $customerRepository->findOneBy(array('id' => $customerId));

            // DB上にLINE IDの登録はあるが、Customerオブジェクトが未発見の場合、LINE IDの削除
            if (is_null($customer)) {
                log_info('削除されたユーザ(custome_id:' . $customerId . ')とのLINE IDのレコードを削除します');
                $lineLoginIntegrationRepository->delete($lineLoginIntegration);
            }
            // 削除後はそのままスルーし、普通のフローに
        }

        /*
          ・ROLE_ADMIN EC-CUBE３では管理者としてログインしていることを意味します。
          ・ROLE_USER EC-CUBE３では顧客としてログインしていることを意味します。
          ・IS_AUTHENTICATED_ANONYMOUSLY 匿名ユーザーを含みます。要はログインしていなくても表示できるという意味です。
          ・IS_AUTHENTICATED_REMEMBERED 「次回から自動的にログインする」機能によってログインしたユーザーです。
          ・IS_AUTHENTICATED_FULLY IS_AUTHENTICATED_REMEMBEREDの対比です。自動的にログインする機能ではなく、当セッション中にフォームで認証を行いログインしたユーザーです。
         */
        // EC-CUBEにログインしているとき
        if ($app->isGranted('ROLE_USER')) {
            log_info('LINEコールバック: ログイン済み');

            //  ログインユーザーのLINE IDが保存されていない場合
            if (is_null($lineLoginIntegration)) {
                $customerId = $app['user']->getId();
                log_info('LINE IDとユーザーの関連付けを開始', array($customerId));
                // LINEの連携処理: ログインユーザーとLINE IDを紐付ける
                $lineLoginIntegration = new LineLoginIntegration();
                $lineLoginIntegration->setLineUserId($lineUserId);
                $lineLoginIntegration->setCustomerId($customerId);
                $lineLoginIntegration->setCustomer($app['user']);
                $app['orm.em']->persist($lineLoginIntegration);
                $app['orm.em']->flush();
                log_info('LINE IDとユーザーの関連付け終了');
            }
            // ログインユーザーのLINE IDが保存されている場合
            else {
                // 現在ログインしている会員IDと、連携DB上で既に紐づいている会員IDが異なるときはエラー
                $registeredCustomerId = $customer->getId();     // 既にDBにLINE IDと紐づけられている顧客ID
                $nowLoggedInCustomerId = $app['user']->getId(); // 新たにLINE IDと紐付けようと申請する顧客ID
                if ($nowLoggedInCustomerId != $registeredCustomerId) {
                    log_info('すでに連携済みのLINE IDを別のアカウントの連携に使おうとしました', array($nowLoggedInCustomerId, $registeredCustomerId));
                    return $app->render('error.twig', array(
                        'error_title' => '重複したLINE IDです',
                        'error_message' => "既に別のアカウントで、同じLINE IDが登録されています。",
                    ));
                }
            }

            return $app->redirect($app->url('mypage_change'));
        }
        // EC-CUBEに未ログインであるとき
        else {
            log_info('LINEコールバック: 未ログイン');

            // DB上にLINE IDの登録なし→新規登録のフロー
            if (is_null($lineLoginIntegration)) {
                return $app->redirect($app->url('entry'));
            }
            // DB上にLINE IDの登録あり
            else {
                // 登録があってもCustomerオブジェクトがnullの場合はシステムエラーの代わりに登録ページへ
                if (is_null($customer)) {
                    log_info('会員ID:' . $customer->getId() . 'と紐付いていたLINE IDでのログインだが、該当ユーザは存在しない');

                    return $app->redirect($app->url('entry'));
                }
                // 登録ありかつCustomerオブジェクトが存在するのでログイン処理
                else {
                    $token = new UsernamePasswordToken($customer, null, 'customer', array('ROLE_USER'));
                    $this->getSecurity($app)->setToken($token);
                    log_info('ログイン済に変更', array($customer->getId()));

                    return $app->redirect($app->url('mypage'));
                }
            }
        }
    }

    /**
     * 設定レコードを取得します
     * @return type
     */
    private function getLineLoginIntegrationSetting()
    {
        $app = \Eccube\Application::getInstance();
        $lineIntegrationSettingRepository = $app['eccube.plugin.line_login_integration.repository.line_login_integration_setting'];
        $lineIntegrationSetting = $lineIntegrationSettingRepository->find(LineLoginIntegrationAdminController::LINE_LOGIN_INTEGRATION_SETTING_TABLE_ID);
        return $lineIntegrationSetting;
    }
}
