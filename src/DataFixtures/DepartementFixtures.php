<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Departement;

class DepartementFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $direction = new Departement();
        $direction->setNomDepartement("Direction");
        $direction->setMailDepartement("melvin.cado@gmail.com");

        $comptable = new Departement();
        $comptable->setNomDepartement("Comptable");
        $comptable->setMailDepartement("melvin.cado@gmail.com");

        $rh = new Departement();
        $rh->setNomDepartement("Ressources Humaines");
        $rh->setMailDepartement("melvin.cado@gmail.com");

        $marketing = new Departement();
        $marketing->setNomDepartement("Marketing");
        $marketing->setMailDepartement("melvin.cado@gmail.com");

        $communication = new Departement();
        $communication->setNomDepartement("Communication");
        $communication->setMailDepartement("melvin.cado@gmail.com");

        $dev = new Departement();
        $dev->setNomDepartement("Developpeur");
        $dev->setMailDepartement("melvin.cado@gmail.com");

        $manager->persist($direction);
        $manager->persist($comptable);
        $manager->persist($rh);
        $manager->persist($marketing);
        $manager->persist($communication);
        $manager->persist($dev);

        $manager->flush();
    }
}
