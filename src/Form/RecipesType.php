<?php

namespace App\Form;

use App\Entity\Recipes;
use App\Entity\Ingredients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RecipesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('text')
            ->add('duration')
            ->add('people_count')
            ->add('photo')
            ->add('ingredients', EntityType::class, [
                'class' => Ingredients::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true, 
                'label' => 'Select Ingredients',
                'mapped' => false,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipes::class,
        ]);
    }
}
