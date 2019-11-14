<?php
namespace App\Controller;


use App\Repository\DegreeRepository;
use App\Repository\YearRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(DegreeRepository $degreeRepo, YearRepository $yearsRepo,
                          UserRepository $userRepo, Request $request)
    {
        //$degrees = $this->getDoctrine()->getRepository(Degree::class)->findAll();
        //De façon plus courte:
        $degrees = $degreeRepo->findAll();
        $years = $yearsRepo->findAll();
        $user = $userRepo->findAll();

        $resultat = [];
        $year="";
        $degree="";

        if ($request->request->count())
        {
            $formations = $request->request->get("formation");
            $annees = $request->request->get("annee");


            $degree = $degreeRepo->find($formations);
            $year = $yearsRepo->find($annees);

            $resultat = $userRepo->search($formations, $annees);
//            dd($resultat);
        }

        return $this->render('home.html.twig', [
            'degrees'=>$degrees,
            'years'=>$years, 'user'=>$user[0],
            'resultat'=>$resultat,
            'theYear'=>$year,
            'theDegree'=>$degree]
        );
    }


}