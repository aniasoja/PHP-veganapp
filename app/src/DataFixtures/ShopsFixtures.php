<?php

/**
 * Shops Fixtures
 */

namespace App\DataFixtures;

use App\Entity\Shops;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ShopsFixtures
 * @package App\DataFixtures
 */
class ShopsFixtures extends AbstractBaseFixtures
{
    /**
     * Load.
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'shops', function ($i) {
            $shop = new Shops;
            $shop->setShopName($this->faker->word);
            return $shop;
        });

        $manager->flush();
    }
}
