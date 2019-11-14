<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Service\Avatar\SvgAvatarFactory;
use App\Service\Helpers\FileSystemHelper;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends BaseFixtures implements DependentFixtureInterface
{
    /**
     * @var SvgAvatarFactory
     */
    private $svg;
    /**
     * @var FileSystemHelper
     */
    private $fileSystem;
    private $uploadPath;

    public function __construct(SvgAvatarFactory $svg, FileSystemHelper $fileSystem, $uploadPath)
    {
        $this->svg = $svg;
        $this->fileSystem = $fileSystem;
        $this->uploadPath = $uploadPath;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr_FR');
        for($i=0; $i<100; $i++)
        {
            $user = new User();
            $promotions = $this->entityReferences("Promotion");

            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setEmail($user->getFirstname().'.'.$user->getLastname().'@'.$faker->freeEmailDomain);
            $user->setPassword(password_hash($faker->password, PASSWORD_DEFAULT));
            $user->setPassword(password_hash($faker->password, PASSWORD_DEFAULT));
            $user->setCity($faker->city);


            $ts = mktime(rand(0, 24), rand(0, 60), rand(0, 60), rand(0,12), rand(0,7), rand(1968, 2002));
            $date = date("Y-m-d", $ts);

            $user->setBirthdate(new \DateTime($date));

            $promos = $faker->randomElements($promotions, rand(1,2));
            foreach($promos as $promo)
            {
                $user->addPromotion($promo);
            }

            $svgCode = $this->svg->getAvatar(2, 5);
            $fileName = sha1(uniqid(rand())).'.svg';
            $this->fileSystem->write($this->uploadPath."/"
                .SvgAvatarFactory::AVATAR_DIR."/".$fileName, $svgCode);

            $user->setAvatar($fileName);
            $manager->persist($user);
        }

        $manager->flush();


    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return array(
            PromotionFixtures::class
        );
    }
}
