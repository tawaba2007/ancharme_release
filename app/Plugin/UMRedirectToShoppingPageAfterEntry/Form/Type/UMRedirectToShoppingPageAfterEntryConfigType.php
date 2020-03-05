<?php

/*
 * This file is part of the UMRedirectToShoppingPageAfterEntry
 *
 * Copyright (C) 2018 U-Mebius Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\UMRedirectToShoppingPageAfterEntry\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class UMRedirectToShoppingPageAfterEntryConfigType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'label' => '項目A',
                'required' => true,
                'constraints' => array(
                    new Assert\NotBlank(),
                ),
            ));
    }

    public function getName()
    {
        return 'umredirecttoshoppingpageafterentry_config';
    }

}
