<?php


namespace App\Controller\Admin;


use App\Form\DegreeFormType;
use App\Repository\DegreeRepository;
use App\Repository\PromotionRepository;
use App\Repository\YearRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin.index")
     */
    function index(DegreeRepository $degreeRepo, YearRepository $yearRepo,
                   PromotionRepository $promoRepo)
    {
        $degrees = $degreeRepo->findAll();
        $years = $yearRepo->findAll();
        $promotions = $promoRepo->findAll();
//        dd($promotions);

        $form = $this->createForm(DegreeFormType::class);

        return $this->render('admin/index.html.twig',
            [
                'degrees'=>$degrees,
                'years'=>$years,
                'promotions' => $promotions,
                'form' => $form->createView()
            ]);
    }
}