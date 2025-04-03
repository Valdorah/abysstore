<?php

namespace App\DataFixtures;

use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ItemFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for($i = 0 ; $i < 10 ; $i++) {
            $item = new Item();
            $item->setName($faker->word);
            $item->setDescription($faker->text());
            $item->setPriceExcludingTaxes($faker->randomFloat(2, 1, 100));
            $item->setQuantity($faker->numberBetween(1, 100));

            $manager->persist($item);
        }

        $manager->flush();
    }
}
