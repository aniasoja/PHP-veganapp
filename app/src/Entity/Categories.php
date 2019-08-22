<?php

/**
 * Categories entity
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * class Categories
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 * @ORM\Table(name="categories")
 */
class Categories
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
     * @ORM\OneToMany(targetEntity="App\Entity\Products", mappedBy="categories")
     */
    private $products;


    /**
     * Category name
     *
     * @var string
     *
     * @ORM\Column(type="string", length=45)
     */
    private $category_name;

    /**
     * Bigger category name
     *
     * @var string
     *
     * @ORM\Column(type="string", length=45)
     */
    private $bigger_category_name;

    /**
     * Categories constructor.
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
     * @return Categories
     */
    public function addProduct(Products $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setCategories($this);
        }

        return $this;
    }

    /**
     * Removing products
     *
     * @param Products $product
     * @return Categories
     */
    public function removeProduct(Products $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getCategories() === $this) {
                $product->setCategories(null);
            }
        }

        return $this;
    }

    /**
     * Getter for Category name
     *
     * @return string|null
     */
    public function getCategoryName(): ?string
    {
        return $this->category_name;
    }

    /**
     * Setter for category name
     * @param string $category_name
     * @return Categories
     */
    public function setCategoryName(string $category_name): self
    {
        $this->category_name = $category_name;

        return $this;
    }

    /**
     * Getter for Bigger category name
     * @return string|null
     */
    public function getBiggerCategoryName(): ?string
    {
        return $this->bigger_category_name;
    }

    /**
     * Setter for bigger category name
     *
     * @param string $bigger_category_name
     * @return Categories
     */
    public function setBiggerCategoryName(string $bigger_category_name): self
    {
        $this->bigger_category_name = $bigger_category_name;

        return $this;
    }
}
