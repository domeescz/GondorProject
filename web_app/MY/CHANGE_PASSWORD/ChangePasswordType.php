<?php

// src/Form/ChangePasswordType.php

// ... (ostatní kód)

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('newPassword', PasswordType::class)
            // Přidat další pole formuláře podle potřeby
            ->add('save', SubmitType::class, ['label' => 'Změnit heslo']);
    }
}
