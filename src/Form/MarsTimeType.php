<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MarsTimeType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('earthDate', DateTimeType::class, [
                    'label' => 'Enter the earth date that you want to check: ',
                    'widget' => 'single_text',
                    'format' => 'dd-MM-yyyy HH:mm'
                ])
                ->add('submit', SubmitType::class, [
                    'label' => 'Get Mars time'
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                // Configure your form options here
        ]);
    }

}
