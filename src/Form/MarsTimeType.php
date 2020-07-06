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
                ->add('earthDate', DateTimeType::class,
                        ['label' => 'Earth date'])
                ->add('current', SubmitType::class, [
                    'label' => 'User current date'
                ])
                ->add('submit', SubmitType::class, [
                    'label' => 'Get Mars times'
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
