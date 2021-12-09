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
        $allTags = ['Végétariens'=>'Vegetarians', 'Halal'=>'Halal', 'Casher'=>'Kosher', 'Sans Gluten'=>'Gluten free',
            'Familles avec enfants'=>'Families with children', 'Réunions d\'affaires'=>'Business meetings',
            'Cuisine locale'=>'Local food', 'Américain'=>'American', 'Burgers'=>'Burgers', 'Crêperie'=>'Creperie',
            'Fast-Food'=>'Fast-Food', 'Gastronomique'=>'Gastronomic', 'Traditionnelle'=>'Traditional', 'Kebab'=>'Kebab',
            'Pizza'=>'Pizza', 'Salades'=>'Salads', 'Sandwich'=>'Sandwich', 'Sushi'=>'Sushi', 'Tacos'=>'Tacos',
            'Snack'=>'Snack', 'A Volonter'=>'At will'];
        $repoTranslate = $manager->getRepository('Gedmo\\Translatable\\Entity\\Translation');

        foreach ($allTags as $tagFr => $tagEn){
            $t = new Tags();
            $t->setNom($tagFr);
            $repoTranslate->translate($t,'nom','en', $tagEn);
            $this->addReference('tag'.$tagFr, $t);
            $manager->persist($t);
        }
        $manager->flush();
    }
}
