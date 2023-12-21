<?php

namespace App\Form;

use App\Entity\Casopis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CasopisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Rok')
            ->add('Poradi')
            ->add('Titul')
            ->add('Popis')
            ->add('Publikovan')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Casopis::class,
        ]);
    }
}
