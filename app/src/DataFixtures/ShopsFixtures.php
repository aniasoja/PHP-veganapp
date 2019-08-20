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
class ShopsFixtures extends AbstactBaseFixtures
{
    /**
     * Load.
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $shop = new Shops();
            $shop->setShopId($this->faker->randomDigitNotNull);
            $shop->setShopName($this->faker->word);
            $this->manager->persist($shop);
        }

        $manager->flush();
    }
}
