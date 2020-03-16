<?php

namespace Plugin\LineLoginIntegration\Controller\Admin;

use Eccube\Application;
use Eccube\Common\Constant;
use Plugin\LineLoginIntegration\Entity\LineLoginIntegrationSetting;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class LineLoginIntegrationAdminController
{
    // 設定テーブルのレコードID 固定値
    const LINE_LOGIN_INTEGRATION_SETTING_TABLE_ID = 1;

    public function setting(Application $app, Request $request)
    {
        $lineLoginIntegrationSetting = $this->getLineLoginIntegrationSetting();

        $settingForm = $app['form.factory']
                ->createBuilder('line_setting', $lineLoginIntegrationSetting)
                ->getForm();

        return $app->render('LineLoginIntegration/Resource/template/admin/setting.twig',
            array('settingForm' => $settingForm->createView()));
    }

    /**
     * 設定の更新処理をおこないます
     * @param Application $app
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function commit(Application $app, Request $request)
    {
        // POST以外はエラーにする
        if ('POST' !== $request->getMethod()) {
            throw new MethodNotAllowedHttpException();
        }

        $postParameters = $request->request->get('line_setting');

        $lineChannelId = trim($postParameters['line_channel_id']);
        $lineChannelSecret = trim($postParameters['line_channel_secret']);

        $lineLoginIntegrationSetting = $this->getLineLoginIntegrationSetting();
        if (empty($lineLoginIntegrationSetting)) {
            $lineLoginIntegrationSetting = new LineLoginIntegrationSetting();
        }
        $lineLoginIntegrationSetting->setId(self::LINE_LOGIN_INTEGRATION_SETTING_TABLE_ID);
        $lineLoginIntegrationSetting->setLineChannelId($lineChannelId);
        $lineLoginIntegrationSetting->setLineChannelSecret($lineChannelSecret);
        $app['orm.em']->persist($lineLoginIntegrationSetting);
        $app['orm.em']->flush();

        return $app->redirect($app->url('plugin_line_login_setting'));
    }

    /**
     * 設定レコードの取得
     * @return type
     */
    private function getLineLoginIntegrationSetting()
    {
        $app = \Eccube\Application::getInstance();
        $lineIntegrationSettingRepository = $app['eccube.plugin.line_login_integration.repository.line_login_integration_setting'];
        $lineIntegrationSetting = $lineIntegrationSettingRepository->find(self::LINE_LOGIN_INTEGRATION_SETTING_TABLE_ID);
        return $lineIntegrationSetting;
    }
}
