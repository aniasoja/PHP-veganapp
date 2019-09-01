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
class CategoriesFixtures extends AbstractBaseFixtures
{
    /**
     * Load.
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'categories', function ($i) {
            $category = new Categories();
            $category->setCategoryName($this->faker->word);
            $category->setBiggerCategoryName($this->faker->word);
            return $category;
        });

        $manager->flush();
    }
}