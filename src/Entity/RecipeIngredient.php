<?php

namespace App\Entity;

use App\Repository\RecipeIngredientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipeIngredientRepository::class)]
class RecipeIngredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\ManyToOne]
    private ?Recipes $recipeId = null;

    #[ORM\ManyToOne]
    private ?Ingredients $ingredientId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getRecipeId(): ?Recipes
    {
        return $this->recipeId;
    }

    public function setRecipeId(?Recipes $recipeId): static
    {
        $this->recipeId = $recipeId;

        return $this;
    }

    public function getIngredientId(): ?Ingredients
    {
        return $this->ingredientId;
    }

    public function setIngredientId(?Ingredients $ingredientId): static
    {
        $this->ingredientId = $ingredientId;

        return $this;
    }
}
