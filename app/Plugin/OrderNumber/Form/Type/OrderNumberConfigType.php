<?php

/*
 * This file is part of the OrderNumber
 *
 * Copyright (C) 2018 iforcom
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\OrderNumber\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class OrderNumberConfigType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('front_format_type', 'choice', array(
                'label' => '注文番号前部分',
                'required' => false,
                'choices'   => array('1' => '年月日', '2' => '月日', '3' => '日'),
            ))
            ->add('rear_format_type', 'choice', array(
                'label' => '注文番号後ろ部分',
                'required' => false,
                'choices'   => array('1' => '注文ID', '2' => '注文番号前部分でリセット', '3' => '乱数10桁'),
            ))
            ->add('digit', 'text', array(
                'label' => '桁数',
                'required' => false,
                'constraints' => array(
                    new Assert\Regex(array(
                        'pattern' => "/^\d+$/u",
                        'message' => 'form.type.numeric.invalid',
                    )),
                ),
            ))
            ;
    }

    public function getName()
    {
        return 'ordernumber_config';
    }

}
