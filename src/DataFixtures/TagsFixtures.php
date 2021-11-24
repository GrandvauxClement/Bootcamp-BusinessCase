<?php

namespace App\DataFixtures;

use App\Entity\Tags;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $allTags = ['Végétariens', 'Halal', 'Casher', 'Sans Gluten', 'Familles avec enfants', 'Réunions d\'affaires', 'Cuisine locale',
            'Americain', 'Burgers', 'Crêperie', 'Fast-Food', 'Gastronomique', 'Traditionnelle', 'Kebab', 'Pizza', 'Salades', 'Sandwich',
            'Sushi', 'Tacos', 'Snack', 'A Volonter'];

        foreach ($allTags as $tag){
            $t = new Tags();
            $t->setNom($tag);
            $this->addReference('tag'.$tag, $t);
            $manager->persist($t);
        }
        $manager->flush();
    }
}
