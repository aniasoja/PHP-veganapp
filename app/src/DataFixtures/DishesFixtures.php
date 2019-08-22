<?php
/**
 * Dishes fixtures
 */

namespace App\DataFixtures;

use App\Entity\Dishes;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class DishesFixtures
 * @package App\DataFixtures
 */
class DishesFixtures extends AbstactBaseFixtures
{
    /**
     * Load.
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $dish = new Dishes();
            $dish->setDishName($this->faker->word);
            $this->manager->persist($dish);
        }

        $manager->flush();
    }
}
