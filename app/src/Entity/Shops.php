<?php
/**
 * Shops entity
 */
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * class Shops
 * @ORM\Entity(repositoryClass="App\Repository\ShopsRepository")
 * @ORM\Table(name="shops")
 */
class Shops
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
     * products relation
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Products", mappedBy="shops")
     */
    private $products;

    /**
     * shopName
     *
     * @var string
     *
     * @ORM\Column(type="string", length=45)
     */
    private $shop_name;


    /**
     * Shops constructor.
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
     * @return Shops
     */
    public function addProduct(Products $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
        }

        return $this;
    }

    /**
     * Removing products
     *
     * @param Products $product
     * @return Shops
     */
    public function removeProduct(Products $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
        }

        return $this;
    }

    /**
     * Getter for shopName
     *
     * @return string|null
     */
    public function getShopName(): ?string
    {
        return $this->shop_name;
    }

//    public function getShopNames(): string
//    {
//
//        foreach ($this->shops as &$value) {
//            $value = $value * 2;
//        }
//
//        return $this->shop_name;
//    }

    /**
     * Setter for shopName
     *
     * @param string $shop_name
     * @return Shops
     */
    public function setShopName(string $shop_name): self
    {
        $this->shop_name = $shop_name;

        return $this;
    }
}
