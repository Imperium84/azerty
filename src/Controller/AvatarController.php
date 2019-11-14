<?php
namespace App\Controller;
use App\Service\Avatar\SvgAvatarFactory;
use App\Service\Helpers\FileSystemHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\Routing\Annotation\Route;


class AvatarController extends AbstractController
{
    private $svgAvatarFactory;
    private $fileSystem;

    public function __construct(SvgAvatarFactory $svg, FileSystemHelper $fileSystem)
    {
        $this->svgAvatarFactory = $svg;
        $this->fileSystem = $fileSystem;
    }

    public function getAvatar($uploadDir)
    {
        $svg = $this->svgAvatarFactory->getAvatar(2, 5);
        $fileName = sha1(uniqid(rand())).'.svg';
        $this->fileSystem->write($uploadDir."/".SvgAvatarFactory::AVATAR_DIR."/".$fileName, $svg);
        return $this->render('avatar.html.twig',['fileName' => $fileName]);
    }
}
