<?php


namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminPromotionController extends AbstractController
{
    /**
     * @Route("/admin/promotion/new", name="admin.promotion.new")
     */
    function new()
    {
        dd("promotion");
    }
}