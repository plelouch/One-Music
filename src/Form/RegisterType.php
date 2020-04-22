<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => "Votre Email",
                'attr' => [
                    'placeholder' => 'Entrez L\'Email'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => "Votre mots de passe",
                'attr' => [
                    'placeholder' => 'Entrez Mots De Passe'
                ]
            ])
            ->add('confirmPassword', PasswordType::class, [
                'label' => "Votre confirmation de mots de passe",
                'attr' => [
                    'placeholder' => 'Entrez Confirmation De Mots De Passe'
                ]
            ])
            ->add('Username', TextType::class, [
                'label' => "Votre Nom d'utilisateur",
                'attr' => [
                    'placeholder' => 'Entrez Le Nom D\'utilisateur'
                ]
            ])
            ->add('firstName', TextType::class, [
                'label' => "Votre prénom",
                'attr' => [
                    'placeholder' => 'Entrez Le Prénom'
                ]
            ])
            ->add('LastName', TextType::class, [
                'label' => "Votre Nom de Famille",
                'attr' => [
                    'placeholder' => 'Entrez Le Nom de Famille'
                ]
            ])
            ->add('dateNaiss', DateType::class, [
                'label' => "Votre date de naissance",
                'widget' => 'single_text',
                'html5' => false,
                'attr' => [
                    'class' => 'js-datepicker'
                ]
            ])
            ->add('isArtist', ChoiceType::class, [
                'label' => "Etes vous artiste ?",
                'choices' => [
                    'Non' => false,
                    'Oui' => true,
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
