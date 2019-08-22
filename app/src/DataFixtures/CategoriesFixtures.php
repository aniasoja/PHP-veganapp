<?php

/**
 * Categories fixtures
 */
namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class CategoriesFixtures
 * @package App\DataFixtures
 */
class CategoriesFixtures extends AbstactBaseFixtures
{
    /**
     * Load.
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $category = new Categories();
            $category->setCategoryName($this->faker->word);
            $category->setBiggerCategoryName($this->faker->word);
            $this->manager->persist($category);
        }

        $manager->flush();
    }
}
