<?php
/*
 * GtmLite: Google Tag Manager コンテナタグ設置プラグイン
 * Copyright (C) 2017 Freischtide Inc. All Rights Reserved.
 * http://freischtide.tumblr.com/
 *
 * License: see LICENSE.txt
 */

namespace Plugin\GtmLite\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class GtmLiteType extends AbstractType
{
    private $app;

    public function __construct(\Eccube\Application $app){
        $this->app = $app;
    }

    /**
     * Build config type form
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return type
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('tid', 'text', array(
                'label' => 'コンテナID',
                'required' => true,
                'constraints' => array(new Assert\NotBlank(array('message' => 'コンテナIDが入力されていません。')),
                                       new Assert\Regex(array('pattern' => '/^GTM-/', 'message' => 'コンテナIDの形式が正しくありません。')))
            ))
            ->add('tag', 'choice', array(
                'label' => 'GTMコンテナタグ',
                'choices' => array(1 => 'コンテナタグを挿入する', 2 => 'コンテナタグを挿入しない'),
                'expanded' => true,
                'required' => true,
                'constraints' => array(new Assert\NotBlank())
            ))
            ->add('optional_events', 'choice', array(
                'label' => 'イベント通知',
                'choices' => array(1 => '有効にする', 2 => '無効にする'),
                'expanded' => true,
                'constraints' => array(new Assert\NotBlank())
            ));
    }

    /**
     * {@inheritdoc}
     **/
    public function getName(){
        return 'gtmlite';
    }
}
