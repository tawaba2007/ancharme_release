<?php

namespace Plugin\LineLoginIntegration;

use Plugin\LineLoginIntegration\Controller\LineLoginIntegrationController;
use Plugin\LineLoginIntegration\Controller\Admin\LineLoginIntegrationAdminController;
use Plugin\LineLoginIntegration\Entity\LineLoginIntegration;
use Eccube\Event\EventArgs;
use Eccube\Event\TemplateEvent;

class LineLoginIntegrationEvent
{

    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * 会員情報変更画面を表示します
     * @param TemplateEvent $event
     */
    public function onRenderMypageChange(TemplateEvent $event)
    {
        if (!$this->isLineSettingCompleted()) {
            return;
        }

        // v3でも $customerId の取得方法がかなり強引……
        $form = ($event->getParameters())["form"];
        $customerId = $form->vars['form']->vars['value']['id'];
        $lineLoginIntegrationRepository = $this->app['eccube.plugin.line_login_integration.repository.line_login_integration'];

        $lineLoginIntegration = $lineLoginIntegrationRepository->findOneBy(array('customer_id' => $customerId));
        $lineIdBySession = $this->app['session']->get(LineLoginIntegrationController::PLUGIN_LINE_LOGIN_INTEGRATION_SSO_USERID);

        // LINEとの紐づけがないとき
        if (empty($lineLoginIntegration)) {
            // LINEのログインボタン表示
            $linkUrl = $this->app->url('plugin_line_login');
            $imgUrl = $this->app->url('homepage') . 'plugin/line_login_integration/assets/img/btn_register_base.png';
            $snipet = '<div class="col-md-3 col-md-offset-1"><a href="' . $linkUrl . '" class="line-button"><img src="' . $imgUrl . '"></a></div>';
            $snipet .= PHP_EOL;
            $snipet .= '<div class="col-md-7" style="margin-bottom:10px;"><p style="margin-top:10px; margin-bottom:10px;">LINEアカウントと連携するには「LINEで登録」ボタンを押してください</p></div>';
            $snipet .= PHP_EOL;
        } // LINEとの紐づけがあっても、現在LINEにログインしていないっぽいとき
        else {
            if (empty($lineIdBySession)) {
                // LINEのログインボタン表示
                $linkUrl = $this->app->url('plugin_line_login');
                $imgUrl = $this->app->url('homepage') . 'plugin/line_login_integration/assets/img/btn_login_base.png';
                $snipet = '<div class="col-md-3 col-md-offset-1"><a href="' . $linkUrl . '" class="line-button"><img src="' . $imgUrl . '"></a></div>';
                $snipet .= PHP_EOL;
                $snipet .= '<div class="col-md-7" style="margin-bottom:10px;">LINEアカウントと連携済みですが、現在LINEでログインしていません。<br>';
                $snipet .= '連係解除をするには、LINEでログインしてください</div>';
            } // LINEとの紐づけがあって、かつLINEにログイン中のとき
            else {
                // 連携解除項目を追加
                $this->replaceMypageForm($event, 'detail_box__job');

                // 上部にLINE連携済みである旨を通知
                $snipet = '<div class="col-md-10 col-md-offset-1" style="margin-bottom:10px;">LINEアカウント連携済です。連携を解除したい場合は「LINE 連携解除」をチェックして「変更する」をボタンを押してください。</div><br>';
                $snipet .= PHP_EOL;
            }
        }

        $search = '<div id="detail_box" class="row">';
        $replace = $search . $snipet;
        $source = str_replace($search, $replace, $event->getSource());
        $event->setSource($source);
    }

    /**
     * 新規会員登録画面を表示します
     * @param TemplateEvent $event
     */
    public function onRenderEntryIndex(TemplateEvent $event)
    {
        if (!$this->isLineSettingCompleted()) {
            return;
        }
        
    }

    /**
     * 新規会員登録確認画面を表示します.
     *
     * @param TemplateEvent $event
     */
    public function onRenderEntryConfirm(TemplateEvent $event)
    {
        if (!$this->isLineSettingCompleted()) {
            return;
        }

    }

    /**
     * 新規会員登録画面にLINEボタンを出力します
     * @param TemplateEvent $event
     */
    public function onRenderLineEntryButton(TemplateEvent $event)
    {
        if (!$this->isLineSettingCompleted()) {
            return;
        }

        $session = $this->app['session'];
        $lineUserId = $session->get(LineLoginIntegrationController::PLUGIN_LINE_LOGIN_INTEGRATION_SSO_USERID);

        $snipet = '';
        if (!empty($lineUserId)) {
            $snipet .= '<div class="col-md-10 col-md-offset-1">LINEログイン済みです。この会員登録が完了すると、LINEでログインできるようになります。</div>';
            $snipet .= PHP_EOL;
        } else {
            $linkUrl = $this->app->url('plugin_line_login');
            $imgUrl = $this->app->url('homepage') . 'plugin/line_login_integration/assets/img/btn_register_base.png';
            $snipet .= '<div class="col-md-3 col-md-offset-1"><a href="' . $linkUrl . '" class="line-button"><img src="' . $imgUrl . '"></a></div>';
            $snipet .= PHP_EOL;
            $snipet .= '<div class="col-md-6" style="padding-top:10px;">LINEアカウントと連携するには「LINEで登録」ボタンを押してください</div>';
            $snipet .= PHP_EOL;
        }
        $search = '<div id="top_box" class="row">';
        $replace = $search . $snipet;
        $source = str_replace($search, $replace, $event->getSource());
        $event->setSource($source);
    }

    /**
     * ログイン画面にLINEボタンを出力します
     * @param TemplateEvent $event
     */
    public function onRenderLineLoginButton(TemplateEvent $event)
    {
        if (!$this->isLineSettingCompleted()) {
            return;
        }

        $snipet = '<div class="col-sm-8 col-sm-offset-2" style="margin-bottom:5px;"><a href="' . $this->app->url('plugin_line_login') . '" class="line-button"><img src="' . $this->app->url('homepage') . 'plugin/line_login_integration/assets/img/btn_login_base.png"></a></div>' . PHP_EOL;
        $search = '<div id="login_box" class="row">';
        $replace = $search . $snipet;
        $source = str_replace($search, $replace, $event->getSource());
        $event->setSource($source);
    }

    /**
     * 管理画面から会員を削除したときにLINEの紐づけを削除
     * @param EventArgs $event
     */
    public function onCompleteCustomerDelete(EventArgs $event)
    {
        if (!$this->isLineSettingCompleted()) {
            return;
        }

        $customer = $event->getArgument('Customer');
        $customerId = $customer->getId();
        log_info("customer_id:" . $customerId . "の会員を削除します");

        // LINE情報を削除する
        $lineLoginIntegrationRepository = $this
            ->app['eccube.plugin.line_login_integration.repository.line_login_integration'];
        $lineLoginIntegration = $lineLoginIntegrationRepository
            ->findOneBy(array('customer_id' => $customerId));
        if (!empty($lineLoginIntegration)) {
            log_info("LINEとの紐づけを削除します" . $customerId);
            $lineLoginIntegrationRepository
                ->deleteLineAssociation($lineLoginIntegration);
            log_info("LINEとの紐づけを削除しました" . $customerId);
        }
    }

    /**
     * 会員の退会処理をおこないます
     * @param EventArgs $event
     */
    public function onCompleteMypageWithdraw(EventArgs $event)
    {
        if (!$this->isLineSettingCompleted()) {
            return;
        }

        log_info('退会');
        // LINE情報を削除する
        $session = $this->app['session'];
        $lineUserId = $session
            ->get(LineLoginIntegrationController::PLUGIN_LINE_LOGIN_INTEGRATION_SSO_USERID);

        $lineLoginIntegrationRepository =
            $this->app['eccube.plugin.line_login_integration.repository.line_login_integration'];
        $lineLoginIntegration = $lineLoginIntegrationRepository
            ->findOneBy(array('line_user_id' => $lineUserId));
        if (!empty($lineLoginIntegration)) {
            log_info("LINEとの紐づけを削除します");
            $lineLoginIntegrationRepository
                ->deleteLineAssociation($lineLoginIntegration);
            log_info("LINEとの紐づけを削除しました");
        }

        $session->remove(LineLoginIntegrationController::PLUGIN_LINE_LOGIN_INTEGRATION_SSO_STATE);
        $session->remove(LineLoginIntegrationController::PLUGIN_LINE_LOGIN_INTEGRATION_SSO_USERID);
    }

    /**
     * 会員登録処理をおこないます
     * @param EventArgs $event
     */
    public function onCompleteEntry(EventArgs $event)
    {
        if (!$this->isLineSettingCompleted()) {
            return;
        }

        // 顧客とLINEユーザーIDをひも付け（line_login_integrationテーブルのレコードを作成）
        log_info('LINEユーザーとの関連付け開始');

        $session = $this->app['session'];
        $lineUserId = $session
            ->get(LineLoginIntegrationController::PLUGIN_LINE_LOGIN_INTEGRATION_SSO_USERID);
        if (!empty($lineUserId)) {
            log_info('LINEログインしているため、ユーザーとの関連付けを実行');
            $lineIntegrationRepository =
                $this->app['eccube.plugin.line_login_integration.repository.line_login_integration'];
            $lineIntegration = $lineIntegrationRepository
                ->findOneBy(array('line_user_id' => $lineUserId));

            $form = $event['form'];

            if (empty($lineIntegration)) {
                $lineIntegration = new LineLoginIntegration();
                $lineIntegration->setLineUserId($lineUserId);
                $customer = $event['Customer'];
                $lineIntegration->setCustomer($customer);
                $this->app['orm.em']->persist($lineIntegration);
                $this->app['orm.em']->flush();
            }

            log_info('LINEユーザーとの関連付け終了');
        } else {
            log_info('LINE未ログインのため関連付け未実施');
        }
    }

    /**
     * 会員情報編集完了時のイベント処理を行います
     *
     * @param EventArgs $event
     */
    public function onCompleteMypageChange(EventArgs $event)
    {
        if (!$this->isLineSettingCompleted()) {
            return;
        }

        $Customer = $event['Customer'];
        $customerId = $Customer->getId();
        $form = $event['form'];

        $lineLoginIntegrationRepository =
            $this->app['eccube.plugin.line_login_integration.repository.line_login_integration'];
        $lineLoginIntegration =
            $lineLoginIntegrationRepository->findOneBy(array('customer_id' => $customerId));

        // LINEの紐づけがすでにあるとき
        if (!empty($lineLoginIntegration)) {
            // LINE情報を削除する
            if ($form->has('is_line_delete')) {
                $is_line_delete = $form->get('is_line_delete')->getData();
                if ($is_line_delete == 1) {
                    // 連携解除
                    $this->lineIdUnassociate($customerId, true);
                }
            }
        } // LINEの紐づけがないとき
        else {
            // 何もしない
            // LINEとの紐づけ処理はログインのコールバック関数(LineLoginIntegrationController.php)内で行われるのでここでは行わない
        }
    }

    /**
     * LINE設定が初期化済みかチェックします
     */
    private function isLineSettingCompleted()
    {
        $lineLoginIntegrationSettingRepository = $this
            ->app['eccube.plugin.line_login_integration.repository.line_login_integration_setting'];
        $lineLoginIntegrationSetting
            = $lineLoginIntegrationSettingRepository
            ->find(LineLoginIntegrationAdminController::LINE_LOGIN_INTEGRATION_SETTING_TABLE_ID);

        if (empty($lineLoginIntegrationSetting)) {
            log_error("Line 設定が初期化されていません。");
            return false;
        }

        $lineChannelId = $lineLoginIntegrationSetting->getLineChannelId();
        if (empty($lineChannelId)) {
            log_error("Line Channel Idが未設定です。");
            return false;
        }

        $lineChannelSecret = $lineLoginIntegrationSetting->getLineChannelSecret();
        if (empty($lineChannelSecret)) {
            log_error("Line Channel Secretが未設定です。");
            return false;
        }

        return true;
    }

    /**
     * LINEアカウントとの連携を解除する処理
     *
     * 会員IDから連携DBを検索し、該当するレコードを削除する処理。管理画面でなくフロントからのフローでは、
     * セッションを削除するのでフラグをtrueにしておく
     *
     * @param int $customerId LINEとの連携を解除したい会員ID
     * @param bool $isDeleteSession セッションまで削除する。デフォでfalse
     * @return bool                 会員がLINEと紐づけされていて、紐づけを解除したときにtrueを返す
     */
    private function lineIdUnassociate($customerId, $isDeleteSession = null)
    {
        $lineLoginIntegrationRepository =
            $this->app['eccube.plugin.line_login_integration.repository.line_login_integration'];
        $lineLoginIntegration = $lineLoginIntegrationRepository
            ->findOneBy(array('customer_id' => $customerId));
        // LINE情報を削除する
        if (!empty($lineLoginIntegration)) {
            log_info('customer_id:' . $customerId . 'のLINE連携を解除');
            $lineLoginIntegrationRepository->deleteLineAssociation($lineLoginIntegration);
            log_info('LINEの連携を解除しました');

            if ($isDeleteSession) {
                $this->app['session']
                    ->remove(LineLoginIntegrationController::PLUGIN_LINE_LOGIN_INTEGRATION_SSO_STATE);
                $this->app['session']
                    ->remove(LineLoginIntegrationController::PLUGIN_LINE_LOGIN_INTEGRATION_SSO_USERID);
                $this->app['session']->remove($this->session->is_line_delete);
            }
            return true;
        }
        return false;
    }

    /**
     * エントリーフォームに「LINE解除」を追加します
     * @param TemplateEvent $event
     * @param type $elementId
     */
    private function replaceMypageForm(TemplateEvent $event, $elementId)
    {
        $snippet = $this->app['twig']->getLoader()
            ->getSource('LineLoginIntegration/Resource/template/mypage_change_add_is_line_delete.twig');
        $source = $event->getSource();

        $pattern = '/<dl id="' . $elementId . '">.*?<\/dl>/s';
        preg_match($pattern, $source, $matches);
        $search = $matches[0];
        $replace = $search . $snippet;

        $source = str_replace($search, $replace, $source);
        $event->setSource($source);
    }
}
