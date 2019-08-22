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
class ProductsFixtures extends AbstactBaseFixtures implements DependentFixtureInterface
{
    /**
     * Load.
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $product = new Products();
            $product->setName($this->faker->word);
            $product->setIsVegan($this->faker->boolean);
            $product->setIsPalmOil($this->faker->boolean);
            $product->setPhoto($this->faker->imageUrl($width, $height, 'food'));
            $product->setIsReviewed($this->faker->boolean);
            $this->manager->persist($product);
        }

        $manager->flush();
    }
    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return array Array of dependencies
     */
    public function getDependenciesShops(): array
    {
        return [ShopsFixtures::class];
    }
    public function getDependenciesDishes(): array
    {
        return [DishesFixtures::class];
    }
    public function getDependenciesCategories(): array
    {
        return [CategoriesFixtures::class];
    }
}
