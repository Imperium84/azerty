<?php


namespace App\Controller\Admin;


use App\Form\DegreeFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminDegreeController extends AbstractController
{
    /**
     * @Route("/admin/degree/new", name="admin.degree.new")
     */
    function new()
    {
    }
}