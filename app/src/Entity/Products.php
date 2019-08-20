<?php
/**
 * Products entity
 */
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * class Products
 * @ORM\Entity(repositoryClass="App\Repository\ProductsRepository")
 * @ORM\Table(name="products")
 */
class Products
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
     * Product Id
     *
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $product_id;

    /**
     * Product name
     *
     * @var string
     *
     * @ORM\Column(type="string", length=45)
     */
    private $name;

    /**
     * Is it vegan?
     *
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $is_vegan;

    /**
     * Does it contain palm oil?
     *
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $is_palm_oil;

    /**
     * Photo
     *
     * @ORM\Column(type="blob", nullable=true)
     */
    private $photo;

    /**
     * Is it reviewed and accepted by admin?
     *
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $is_reviewed;

    /**
     * Shops relation
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Shops", mappedBy="products")
     */
    private $shops;

    /**
     * Dishes relation
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Dishes", inversedBy="products")
     */
    private $dishes;

    /**
     * Categories relation
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="products")
     */
    private $categories;

    /**
     * Products constructor.
     */
    public function __construct()
    {
        $this->shops = new ArrayCollection();
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
     * Getter for ProductId
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return $this->product_id;
    }

    /**
     * Setter for ProductId
     *
     * @param int $product_id
     * @return Products
     */
    public function setProductId(int $product_id): self
    {
        $this->product_id = $product_id;

        return $this;
    }

    /**
     * Getter for Name
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Setter for Name
     *
     * @param string $name
     * @return Products
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Getter for IsVegan
     *
     * @return bool|null
     */
    public function getIsVegan(): ?bool
    {
        return $this->is_vegan;
    }

    /**
     * Setter for IsVegan
     *
     * @param bool $is_vegan
     * @return Products
     */
    public function setIsVegan(bool $is_vegan): self
    {
        $this->is_vegan = $is_vegan;

        return $this;
    }

    /**
     * Getter for IsPalmOil
     *
     * @return bool|null
     */
    public function getIsPalmOil(): ?bool
    {
        return $this->is_palm_oil;
    }

    /**
     * Setter for IsPalmOil
     *
     * @param bool $is_palm_oil
     * @return Products
     */
    public function setIsPalmOil(bool $is_palm_oil): self
    {
        $this->is_palm_oil = $is_palm_oil;

        return $this;
    }

    /**
     * Getter for Photo
     *
     * @return blob
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Setter for Photo
     *
     * @param $photo
     * @return Products
     */
    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**Getter for IsReviewed
     *
     * @return bool|null
     */
    public function getIsReviewed(): ?bool
    {
        return $this->is_reviewed;
    }

    /**
     * Setter for IsReviewed
     *
     * @param bool $is_reviewed
     * @return Products
     */
    public function setIsReviewed(bool $is_reviewed): self
    {
        $this->is_reviewed = $is_reviewed;

        return $this;
    }

    /**
     * Getter for Shops
     *
     * @return Collection|Shops[]
     */
    public function getShops(): Collection
    {
        return $this->shops;
    }

    /**
     * Adding shops
     *
     * @param Shops $shop
     * @return Products
     */
    public function addShop(Shops $shop): self
    {
        if (!$this->shops->contains($shop)) {
            $this->shops[] = $shop;
            $shop->addProduct($this);
        }

        return $this;
    }

    /**
     * Removing shops
     *
     * @param Shops $shop
     * @return Products
     */
    public function removeShop(Shops $shop): self
    {
        if ($this->shops->contains($shop)) {
            $this->shops->removeElement($shop);
            $shop->removeProduct($this);
        }

        return $this;
    }

    /**
     * Getter for Dishes
     *
     * @return Dishes|null
     */
    public function getDishes(): ?Dishes
    {
        return $this->dishes;
    }

    /**
     * Setter for Dishes
     *
     * @param Dishes|null $dishes
     * @return Products
     */
    public function setDishes(?Dishes $dishes): self
    {
        $this->dishes = $dishes;

        return $this;
    }

    /**
     * Getter for Categories
     *
     * @return Categories|null
     */
    public function getCategories(): ?Categories
    {
        return $this->categories;
    }

    /**
     * Setter for Categories
     *
     * @param Categories|null $categories
     * @return Products
     */
    public function setCategories(?Categories $categories): self
    {
        $this->categories = $categories;

        return $this;
    }
}
