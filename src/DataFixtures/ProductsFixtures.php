<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use function Symfony\Component\String\u;
use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
//  implements FixtureGroupInterface


class ProductsFixtures extends Fixture implements FixtureGroupInterface
{
    
    public function loadProducts(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        $faker->addProvider(new \Liior\Faker\Prices($faker));

        for ($i = 0; $i < 50; $i++) {
            $product = new Products();
            $product->setTitle($faker->productName)
                ->setRef($faker->price(20, 200))
                ->setEan($faker->price(20, 200))
                ->setSlug($faker->price(20, 200))
                ->setQte($faker->price(20, 200))
                ->setQteLogistic($faker->price(20, 200))
                ->setIsValid($faker->price(20, 200))
                ->setIsShow($faker->price(20, 200))
                // ->setDateStart($faker->price(20, 200))
                // ->setDateEnd($faker->price(20, 200))
                // ->setType($faker->price(20, 200))
                // ->setSupplier($faker->price(20, 200))
                // ->setTransportCode($faker->price(20, 200))
                ->setDescription($faker->price(20, 200))
                ->setPrice($faker->price(20, 200))
                ->setSolde($faker->price(20, 200))
                ->setCreatedAt($faker->price(20, 200));
                // ->setImage($faker->imageUrl(400, 400))
                // ->setStock($faker->stock(1, 100));

            $manager->persist($product);
        }

        $manager->flush();
    }

    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $product = new Products();
            $product->setName('product '.$i);
            $product->setPrice(mt_rand(10, 100));
            $manager->persist($product);
        }

        $manager->flush();
    }

    
    /**
     * This method must return an array of groups
     * on which the implementing class belongs to
     *
     * @return string[]
     */
    public static function getGroups(): array
    {
            return ['group1', 'group2'];
    }
}