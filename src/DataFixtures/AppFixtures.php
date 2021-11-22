<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $contact1 = new Contact();
        $contact1->setNom("Enguehard");
        $contact1->setPrenom("Hugo");
        $contact1->setSujet("Anime");
        $contact1->setEmail("hugo.enguehard@hotmail.com");
        $contact1->setMessage("Je suis nouveau");
        $contact1->setNewsletter("oui");
        
        $manager->persist($contact1);

        $manager->flush();
    }
}
