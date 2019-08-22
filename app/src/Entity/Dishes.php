<?php

/**
 * Dishes entity
 */
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * class Dishes
 * @ORM\Entity(repositoryClass="App\Repository\DishesRepository")
 * @ORM\Table(name="dishes")
 */
class Dishes
{
    /**
     * Primary key
     *
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Products relation
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Products", mappedBy="dishes")
     */
    private $products;

    /**
     * Dish name
     *
     * @var string
     *
     * @ORM\Column(type="string", length=45)
     */
    private $dish_name;

    /**
     * Dishes constructor.
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * Getter for Id
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for Products
     *
     * @return Collection|Products[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    /**
     * Adding products
     *
     * @param Products $product
     * @return Dishes
     */
    public function addProduct(Products $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setDishes($this);
        }

        return $this;
    }

    /**
     * Removing products
     *
     * @param Products $product
     * @return Dishes
     */
    public function removeProduct(Products $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getDishes() === $this) {
                $product->setDishes(null);
            }
        }

        return $this;
    }

    /**
     * Getter for Dish name
     * @return string|null
     */
    public function getDishName(): ?string
    {
        return $this->dish_name;
    }

    /**
     * Setter for Dish name
     *
     * @param string $dish_name
     * @return Dishes
     */
    public function setDishName(string $dish_name): self
    {
        $this->dish_name = $dish_name;

        return $this;
    }
}
