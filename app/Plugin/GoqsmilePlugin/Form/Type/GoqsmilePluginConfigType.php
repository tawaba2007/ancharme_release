<?php

namespace Plugin\GoqsmilePlugin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class GoqsmilePluginConfigType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('app_id', 'text', [
                'label' => 'アプリケーション識別ID',
                'required' => true,
                'constraints' => [new Assert\NotBlank()],
            ])
            ->add(
              'save',
              'submit',
              [
                  'label' => '保存する',
                  'attr'  => [
                      'class' => 'btn btn-primary',
                  ],
              ]
            );
    }

    public function getName()
    {
        return 'goqsmileplugin_config';
    }

}
