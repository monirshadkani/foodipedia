<?php

namespace App\Form;

use App\Entity\Ingredients;
use App\Entity\RecipeIngredient;
use App\Entity\Recipes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipeIngredientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('quantity')
            ->add('recipeId', EntityType::class, [
                'class' => Recipes::class,
                'choice_label' => 'id',
            ])
            ->add('ingredientId', EntityType::class, [
                'class' => Ingredients::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RecipeIngredient::class,
        ]);
    }
}
