<?php

namespace App\DataFixtures;

use App\Entity\Promotion;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PromotionFixtures extends BaseFixtures implements DependentFixtureInterface
{
    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return array(
            DegreeFixtures::class,
            YearFixtures::class
        );
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $degrees = $this->entityReferences("Degree");
        $years = $this->entityReferences("Year");
        $compteur = 0;
        foreach($degrees as $degree)
        {
            foreach($years as $year)
            {
                $promotion = new Promotion();
                $promotion->setDegree($degree);
                $promotion->setYear($year);
                $this->addReference("Promotion_".$compteur, $promotion);
                $manager->persist($promotion);
                $compteur++;
            }
        }

        $manager->flush();
    }

}
