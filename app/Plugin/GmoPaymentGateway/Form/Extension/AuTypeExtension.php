<?php
/*
 * Copyright(c) 2016 GMO Payment Gateway, Inc. All rights reserved.
 * http://www.gmo-pg.com/
 */

namespace Plugin\GmoPaymentGateway\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvents;
use Plugin\GmoPaymentGateway\Controller\Util\PaymentUtil;

/**
 * Extension of Au payment edit form.
 */
class AuTypeExtension extends AbstractTypeExtension
{
    private $app;

    public function __construct(\Eccube\Application $app)
    {
        $this->app = $app;
    }

    /**
     * Build credit form
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return type
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $paymentId = $this->app['request']->attributes->get('id');
        $GmoPaymentMethod = $this->app['orm.em']->getRepository('Plugin\GmoPaymentGateway\Entity\GmoPaymentMethod')->findOneBy(array('id' => $paymentId));
        if (!is_null($GmoPaymentMethod)) {
            $memo03 = $GmoPaymentMethod->getMemo03();
            if ($memo03 != $this->app['config']['GmoPaymentGateway']['const']['PG_MULPAY_PAYID_AU'])
                return;
        } else {
            return;
        }

        $builder
            ->add('rule_min', 'money', array(
                'label' => false,
                'currency' => 'JPY',
                'required' => false,
                'precision' => 0,
                'constraints' => array(
                    new Assert\GreaterThanOrEqual(
                        array('value' => 1,
                              'message' => '利用条件(下限)は1円以上にしてください。')
                    ),
                    new Assert\NotBlank(array(
                            'message' => '※ 支払期限は数字で入力してください。')
                    ),
                ),
            ))
            ->add('JobCd', 'choice', array(
                'expanded' => true,
                'choices' => array(
                    'AUTH' => '仮売上',
                    'CAPTURE' => '即時売上',
                ),
                'label' => '処理区分',
                'attr' => array(
                    'class' => 'gmo_payment_form',                    
                ),
                'constraints' => array(
                    new Assert\NotBlank(array(
                            'message' => '※ 処理区分が入力されていません。')
                    ),                    
                ),
                'mapped' => false,
            ))
            ->add('PaymentTermSec', 'text', array(
                'label' => '支払期限',
                'required' => false,
                'attr' => array(
                    'class' => 'width54',
                    'maxlength' => '5',
                ),
                'mapped' => false,
                'constraints' => array(
                    new Assert\Regex(array(
                        'pattern' => '/\D/',
                        'match'   => false,
                        'message' => '※ 支払期限は数字で入力してください。')
                    ),                    
                    new Assert\LessThanOrEqual(
                        array('value' => 86400,
                            'message' => '※ 支払期限は最大86400秒まで設定可能です。')
                    ),                    
                ),
            ))
            ->add('ServiceName', 'text', array(
                'required' => true,
                'attr' => array(
                    'class' => 'width222',
                    'maxlength' => '50',
                ),
                'constraints' => array(
                    new Assert\NotBlank(
                        array('message' => '※ サービス名（店名）が入力されていません。')
                    ),                    
                    new Assert\Length(
                        array('max' => 48,
                              'maxMessage' => '※ サービス名（店名）は48字以下で入力してください。')
                    ),
                ),
                'mapped' => false,
            ))
            ->add('ServiceTel_1', 'text', array(
                'required' => true,
                'attr' => array(
                    'class' => 'width54',
                    'minlength' => '2',
                    'maxlength' => '4',
                ),
                'mapped' => false,
                'constraints' => array(
                    new Assert\Length(array(
                        'min' => 2, 
                        'max' => 4, 
                        'minMessage' => '※ 表示電話番号1は2字以上で入力してください。', 
                        'maxMessage' => '※ 表示電話番号1は4字以下で入力してください。')),
                    new Assert\Regex(array('pattern' => '/\A\d+\z/', 'message' => '※ 表示電話番号1は数字で入力してください。')),
                    new Assert\NotBlank(array(
                            'message' => '※ 表示電話番号1は数字で入力してください。')
                    ),
                ),
            ))
            ->add('ServiceTel_2', 'text', array(
                'required' => true,
                'attr' => array(
                    'class' => 'width54',
                    'minlength' => '2',
                    'maxlength' => '4',
                ),
                'mapped' => false,
                'constraints' => array(
                    new Assert\Length(array(
                        'min' => 2, 
                        'max' => 4, 
                        'minMessage' => '※ 表示電話番号2は2字以上で入力してください。', 
                        'maxMessage' => '※ 表示電話番号2は4字以下で入力してください。')),
                    new Assert\Regex(array('pattern' => '/\A\d+\z/', 'message' => '※ 表示電話番号2は数字で入力してください。')),
                    new Assert\NotBlank(array(
                            'message' => '※ 表示電話番号2は数字で入力してください。')
                    ),
                ),
            ))
            ->add('ServiceTel_3', 'text', array(
                'required' => true,
                'attr' => array(
                    'class' => 'width54',
                    'minlength' => '2',
                    'maxlength' => '4',
                ),
                'mapped' => false,
                'constraints' => array(
                    new Assert\Length(array(
                        'min' => 2, 
                        'max' => 4, 
                        'minMessage' => '※ 表示電話番号3は2字以上で入力してください。', 
                        'maxMessage' => '※ 表示電話番号3は4字以下で入力してください。')),
                    new Assert\Regex(array('pattern' => '/\A\d+\z/', 'message' => '※ 表示電話番号3は数字で入力してください。')),
                    new Assert\NotBlank(array(
                            'message' => '※ 表示電話番号3は数字で入力してください。')
                    ),
                ),
            ))
            ->add('order_mail_title1', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => 'width222',
                    'maxlength' => '50',
                ),
                'constraints' => array(
                    new Assert\Length(
                        array('max' => 50,
                              'maxMessage' => '※ 決済完了案内タイトルは50字以下で入力してください。')
                    ),
                ),
                'mapped' => false,
            ))
            ->add('order_mail_body1', 'textarea', array(
                'required' => false,
                'attr' => array(
                    'class' => 'area',
                    'maxlength' => '1000',
                ),
                'constraints' => array(
                    new Assert\Length(
                        array('max' => 1000,
                              'maxMessage' => '※ 決済完了案内本文は1000字以下で入力してください。')
                    ),
                ),
                'mapped' => false,
            ))
            ->add('ClientField1', 'text', array(
                'required' => false,
                'label' => '加盟店自由項目1',
                'attr' => array(
                    'class' => 'width222',
                    'maxlength' => '100',
                ),
                'constraints' => array(
                    new Assert\Length(
                        array('max' => 100,
                              'maxMessage' => '※ 自由項目1は100字以下で入力してください。')
                    ),
                ),
                'mapped' => false,
            ))
            ->add('ClientField2', 'text', array(
                'required' => false,
                'label' => '加盟店自由項目2',
                'attr' => array(
                    'class' => 'width222',
                    'maxlength' => '100',
                ),
                'constraints' => array(
                    new Assert\Length(
                        array('max' => 100,
                              'maxMessage' => '※ 自由項目2は100字以下で入力してください。')
                    ),
                ),
                'mapped' => false,
            ))
            ->add('RetURL', 'hidden', array(
                'required' => false,
                'mapped' => false,
            ))
            ->add('Version', 'hidden', array(
                'required' => false,
                'mapped' => false,
            ));

            //***Code for php < 5.4***
            $that = &$this->app;
            //***End***
            $builder->addEventListener(FormEvents::POST_BIND, function ($event) use($builder, &$that) {
                $form = $event->getForm();
                $count = 0;
                if ($form['ServiceTel_1']->getData() != '') {
                    $count++;
                }
                if ($form['ServiceTel_2']->getData() != '') {
                    $count++;
                }
                if ($form['ServiceTel_3']->getData() != '') {
                    $count++;
                }
                if ($count != 0 && $count != 3) {
                    $form['ServiceTel_1']->addError(new FormError('※ 全て入力してください。'));
                }

                $objUtil = new PaymentUtil($that);
                $isHaveProhibitedChar = false;
                for ($i = 0; $i < mb_strlen($form['ServiceName']->getData()); $i=$i+3){
                    $tmp = mb_substr($form['ServiceName']->getData(), $i , 3);
                    if($objUtil->isProhibitedChar($tmp))
                    {
                        $form['ServiceName']->addError(new FormError('※ サービス名（店名）に禁止されている文字「'.$tmp.'」が含まれています。'));
                        $isHaveProhibitedChar = true;
                        break;
                    }
                }
            });
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
    }

    public function getExtendedType()
    {
        return 'payment_register';
    }
}
