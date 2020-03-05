<?php

/*
 * This file is part of the ApgProductClassImage
 *
 * Copyright (C) 2018 ARCHIPELAGO Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ApgProductClassImage\Form\Type;

use Plugin\ApgProductClassImage\Domain\ClassImageInsertType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ApgProductClassImageConfigType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image_insert_type', 'choice', array(
                    'label' => '規格画像の挿入部',
                    'choices' => ClassImageInsertType::getName(),
                    'choice_label' => function ($type) {
                        return ClassImageInsertType::getDisplayName($type);
                    },
                )
            )->add('image_max_size', 'integer', array(
                    'label' => 'アップロード可能な画像サイズ(MB)',
                    'constraints' => array(
                        new Assert\Length(array(
                            'max' => 100000,
                            'min'        => 1,
                            'minMessage' => '{{ limit }}MB以上を指定してください',
                            'maxMessage' => '{{ limit }}MB以下を指定してください',
                        ))
                    )
                )
            );
    }

    public function getName()
    {
        return 'apgproductclassimage_config';
    }

}
