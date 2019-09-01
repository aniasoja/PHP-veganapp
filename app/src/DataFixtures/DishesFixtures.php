<?php
/**
 * Dishes fixtures
 */

namespace App\DataFixtures;

use App\Entity\Dishes;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class DishesFixtures
 * @package App\DataFixtures
 */
class DishesFixtures extends AbstractBaseFixtures
{
    /**
     * Load.
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'dishes', function ($i) {
            $dish = new Dishes();
            $dish->setDishName($this->faker->word);
            return $dish;
        });

        $manager->flush();
    }
}
