<?php

/**
 * Products fixtures
 */
namespace App\DataFixtures;

use App\Entity\Products;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ProductsFixtures
 * @package App\DataFixtures
 */
class ProductsFixtures extends AbstactBaseFixtures
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
            $product->setProductId($this->faker->randomDigitNotNull);
            $product->setName($this->faker->word);
            $product->setIsVegan($this->faker->boolean);
            $product->setIsPalmOil($this->faker->boolean);
            $product->setPhoto($this->faker->image());
            $product->setIsReviewed($this->faker->boolean);
            $this->manager->persist($product);
        }

        $manager->flush();
    }
}
