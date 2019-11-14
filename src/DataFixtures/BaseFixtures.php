<?php


namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;

abstract class BaseFixtures extends Fixture
{
    private $references = [];

    protected function entityReferences(string $name)
    {
        if(!array_key_exists($name, $this->references))
        {
            $refs = $this->referenceRepository->getReferences();

            $this->references[$name] = [];
            foreach ($refs as $key=>$value)
            {
                if (strpos($key, $name."_")===0)
                {
                    $this->references[$name][]= $this->getReference($key);
                }
            }
        }

        return $this->references[$name];
    }
}