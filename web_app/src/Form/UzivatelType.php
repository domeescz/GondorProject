<?php

namespace App\Form;

use App\Entity\Uzivatel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UzivatelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'User' => 'ROLE_USER',
                    'Admin' => 'ROLE_ADMIN',
                    'Redaktor' => 'ROLE_REDAKTOR',
                    'Autor' => 'ROLE_AUTOR',
                    'Recenzent' => 'ROLE_RECENZENT',
                    'ŠéfRedaktor' => 'ROLE_SEFREDAKTOR'
                    // Další role podle potřeby
                ],
                'expanded' => true, // Nebo false pro select místo radio buttons
                'multiple' => true, // Nebo false pokud má být jen jedna role
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Uzivatel::class,
        ]);
    }
}
