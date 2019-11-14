<?php

namespace App\DataFixtures;

use App\Entity\Degree;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class DegreeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $tabFormations = ['BTS developpement web', ' BTS design web', 'CAP electricien', 'BTS SIO'];

        foreach($tabFormations as $key=>$formation)
        {
            $degree = new Degree();
            $degree->setName($formation);
            $manager->persist($degree);
            $this->addReference('Degree_'.$key, $degree);
        }


        $manager->flush();
    }
}
