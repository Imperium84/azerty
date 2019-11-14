<?php

namespace App\DataFixtures;


use App\Entity\Year;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class YearFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $years = ["2011/2012", "2012/2013", "2013/2014", "2015/2016", "2016/2017", "2018/2019"];
        foreach ($years as $key=>$y)
        {
            $year= new Year();
            $year->setTitle($y);
            $manager->persist($year);
            $this->addReference('Year_'.$key, $year);
        }

        $manager->flush();
    }
}
