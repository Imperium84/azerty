<?php


namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminYearController extends AbstractController
{
    /**
     * @Route("/admin/year/new", name="admin.year.new")
     */
    function new()
    {
        dd("year");
    }
}