<?php
/*
  * This file is part of the CssEditor plugin
  *
  * Copyright (C) >=2017 lecast system.
  * @author Tetsuji Shiro 
  *
  * このプラグインは再販売禁止です。
  */

namespace Plugin\CssEditor\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class RecommendProductType.
 */
class CssEditorType extends AbstractType
{
    /**
     * @var \Eccube\Application
     */
    private $app;

    /**
     * RecommendProductType constructor.
     *
     * @param \Silex\Application $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Build config type form.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $app = $this->app;
        $builder
            ->add('history_id', 'hidden', array(
            ))
            ->add('text', 'text', array(
                'trim' => true,
                'attr' => array(
                    'placeholder' => "title",
                ),
            ))
            ->add('file_name', 'text', array(
                'required' => true,
                'trim' => true,
            ))
            ->add('is_history', 'checkbox', array(
                'required' => false,
                'trim' => true,
            ))
            ->add('css', 'textarea', array(
                'required' => true,
                'trim' => true,
                'attr' => array(
                    'placeholder' => "css",
                ),
            ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'admin_CssEditor';
    }
}
