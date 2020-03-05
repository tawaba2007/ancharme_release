<?php
/*
 * UaGaEEc: Google Analytics eコマース/拡張eコマース対応プラグイン
 * Copyright (C) 2016-2017 Freischtide Inc. All Rights Reserved.
 * http://freischtide.tumblr.com/
 *
 * License: see LICENSE.txt
 */

namespace Plugin\UaGaEEc\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class UaGaEEcType extends AbstractType
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
                'label' => 'トラッキングID',
                'required' => true,
                'constraints' => array(new Assert\NotBlank(array('message' => 'トラッキングIDが入力されていません。')),
                                       new Assert\Regex(array('pattern' => '/^UA-/', 'message' => 'トラッキングIDの形式が正しくありません。')))
            ))
            ->add('eec', 'choice', array(
                'label' => '拡張eコマース/eコマース',
                'choices' => array(1 => '拡張eコマース', 2 => 'eコマース'),
                'expanded' => true,
                'required' => true,
                'constraints' => array(new Assert\NotBlank())
            ))
            ->add('category', 'choice', array(
                'label' => 'カテゴリ名',
                'choices' => array(1 => 'カテゴリを含める', 2 => 'カテゴリを含めない'),
                'expanded' => true,
                'constraints' => array(new Assert\NotBlank())
            ))
            ->add('include_variant', 'choice', array(
                'label' => '商品名に規格名を含める',
                'choices' => array(1 => '含める', 2 => '含めない'),
                'expanded' => true,
                // 'constraints' => array(new Assert\NotBlank())
            ))
            ->add('track_user_id', 'choice', array(
                'label' => 'ユーザーIDトラッキング',
                'choices' => array(1 => '有効にする', 2 => '無効にする'),
                'expanded' => true,
                'constraints' => array(new Assert\NotBlank())
            ))
            ->add('display_features', 'choice', array(
                'label' => 'ユーザー属性とインタレストカテゴリ',
                'choices' => array(1 => '有効にする', 2 => '無効にする'),
                'expanded' => true,
                'constraints' => array(new Assert\NotBlank())
            ))
            ->add('user_timings', 'choice', array(
                'label' => 'カスタム速度',
                'choices' => array(1 => '有効にする', 2 => '無効にする'),
                'expanded' => true,
                'constraints' => array(new Assert\NotBlank())
            ))
            ->add('imp_track', 'choice', array(
                'label' => 'インプレッション計測',
                'choices' => array(1 => '有効にする', 2 => '無効にする'),
                'expanded' => true,
                'constraints' => array(new Assert\NotBlank())
            ))
            ->add('crossdomain_linker', 'text', array(
                'label' => 'クロスドメイントラッキング',
                'constraints' => array(new Assert\Length(array('min' => 0, 'max' => 1024)),
                                       new Assert\Regex(array('pattern' => '/^[a-z0-9,.\-\'\s]+$/i', 'message' => 'フォーマットが正しくありません。')))
            ))
            ->add('use_custom_referrer', 'choice', array(
                'label' => 'カスタムリファラトラッキング',
                'choices' => array(1 => '設定する', 2 => '設定しない'),
                'expanded' => true,
                'constraints' => array(new Assert\NotBlank())
            ));
    }

    /**
     * {@inheritdoc}
     **/
    public function getName(){
        return 'uagaeec';
    }
}
