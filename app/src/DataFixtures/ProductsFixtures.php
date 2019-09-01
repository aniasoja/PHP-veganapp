<?php

/**
 * Products fixtures
 */

namespace App\DataFixtures;

use App\Entity\Categories;
use App\Entity\Dishes;
use App\Entity\Products;
use App\Entity\Shops;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ProductsFixtures
 * @package App\DataFixtures
 */
class ProductsFixtures extends AbstractBaseFixtures
{
    /**
     * Load.
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(50, 'products', function ($i) {
            $product = new Products();
            $product->setName($this->faker->word);
            $product->setIsVegan($this->faker->boolean);
            $product->setIsPalmOil($this->faker->boolean);
            $product->setPhoto($this->faker->imageUrl(500, 500, 'food'));
            $product->setIsReviewed($this->faker->boolean);
            return $product;
        });

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return array Array of dependencies
     */
    public function getDependencies(): array
    {
        return [ShopsFixtures::class, DishesFixtures::class, CategoriesFixtures::class];
    }
}
