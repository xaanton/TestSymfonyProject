<?php

namespace App\Form;

use App\Entity\RadioTest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RadioTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('selectedValue', ChoiceType::class, array(
                'choices'  => ['Value1'=>0,'Value2'=>2,'Value3'=>3],
                'expanded' => true,
                'multiple' => false,
            ))
            ->add('save', SubmitType::class, [
                'attr' => ['style' => 'color:red'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RadioTest::class,
        ]);
    }
}
