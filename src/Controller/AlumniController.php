<?php


namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AlumniController extends AbstractController
{
    /**
     * @Route("template/alumni/{id}/{slug}", name="alumni.index")
     */
    public function index(User $user)
    {
//        dd($user);
        return $this->render("alumni.html.twig", ["user"=>$user]);
    }

}