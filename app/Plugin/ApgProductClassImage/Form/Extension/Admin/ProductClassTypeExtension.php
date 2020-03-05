<?php

/*
 * This file is part of the ApgProductClassImage
 *
 * Copyright (C) 2018 ARCHIPELAGO Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ApgProductClassImage\Form\Extension\Admin;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * 商品規格画像を保存するためのフォーム
 * Class ProductClassTypeExtension
 * @package Plugin\ApgProductClassImage\Form\Extension\Admin
 */
class ProductClassTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'file_name',
            'hidden',
            array(
                'mapped' => false,
            )
        )->add(
            'file_delete_flag',
            'checkbox',
            array(
                'required' => false,
                'label' => false,
                'mapped' => false,
            )
        );
    }

    public function getExtendedType()
    {
        return 'admin_product_class';
    }
}