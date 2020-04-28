<?php

namespace App\Form;

use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => "Titre de la pub",
                'attr' => [
                    'placeholder' => "saisir le titre de la pub"
                ]
            ])
            ->add('image', FileType::class, [
                'label' => 'Image de la publication',
                'data_class' => null
            ])
            ->add('introduction', TextType::class, [
                'label' => "Introduction de la pub",
                'attr' => [
                    'placeholder' => "saisir une petite introduction à la pub"
                ]
            ])
            ->add('content', TextareaType::class, [
                'label' => "Le contenu de la pub",
                'attr' => [
                    'placeholder' => "Saisir le contenu du pub"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
