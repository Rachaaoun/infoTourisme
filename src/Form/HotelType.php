<?php

namespace App\Form;

use App\Entity\Hotel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class HotelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'attr' => ['class' => 'form-control' , 'placeholder' => 'Nom',
            ]])
            ->add('nombrechambre',IntegerType::class,[
                'attr' => ['class' => 'form-control' , 'placeholder' => 'nombre chambre',
            ]])
            ->add('categorie',TextType::class,[
                'attr' => ['class' => 'form-control' , 'placeholder' => 'categorie',
            ]])
            ->add('lieu' ,TextType::class,[
                'attr' => ['class' => 'form-control' , 'placeholder' => 'lieu',
            ]])
            ->add('images', FileType::class,[
                'attr' => ['class' => 'form-control'] ,
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hotel::class,
        ]);
    }
}
