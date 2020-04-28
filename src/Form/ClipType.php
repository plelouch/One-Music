<?php

namespace App\Form;

use App\Entity\Clip;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => "Titre du clip",
            ])
            ->add('video', FileType::class, [
                'label' => "Vidéo",
                'data_class' => null
            ])
            ->add('description', TextareaType::class, [
                'label' => "Petite description du clip"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Clip::class,
        ]);
    }
}
