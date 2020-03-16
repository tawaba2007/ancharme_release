<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2015 LOCKON CO.,LTD. All Rights Reserved.
 * http://www.lockon.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\LineLoginIntegration\Form\Extension;

use Plugin\LineLoginIntegration\Controller\LineLoginIntegrationController;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

class EntryLineLoginIntegrationTypeExtension extends AbstractTypeExtension
{

    private $app;

    public function __construct(\Eccube\Application $app)
    {
        $this->app = $app;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // LINEログインしている場合に表示
        $session = $this->app['session'];
        $lineUserId = $session->get(LineLoginIntegrationController::PLUGIN_LINE_LOGIN_INTEGRATION_SSO_USERID);
        if (!empty($lineUserId)) {
            $builder
                ->add('is_line_delete', 'checkbox', array(
                    'required' => false,
                    'label' => '解除',
                    'mapped' => false,
                    'value' => '0',
                ));
        }
    }

    public function getExtendedType()
    {
        return 'entry';
    }
}
