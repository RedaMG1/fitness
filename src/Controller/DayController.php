<?php

namespace App\Controller;

use App\Repository\DayRepository;
use App\Repository\DayStartRepository;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DayController extends AbstractController
{
    #[Route('/day/{id}', name: 'app_day')]
    public function index(DayRepository $dayRepository,$id): Response
    {
        $days = $dayRepository->findBy(['program'=>$id]);
        return $this->render('day/index.html.twig', [
            'days' => $days,
        ]);
    }

    #[Route('/day/start/{id}', name: 'day_start')]
    public function start(
        DayRepository $dayRepository,DayStartRepository $dayStartRepository,
        ProgramRepository $programRepository,$id
    ): Response
    {
        $days = $dayRepository->findAll();
        $programs = $programRepository->findAll();
        $dayStarts = $dayStartRepository->findBy(['day'=>$id]);
        return $this->render('day/start.html.twig', [
            'programs' => $programs,
            'dayStarts' => $dayStarts,
            'days' => $days,
        ]);
    }

    #[Route('/dayStart/filter/{id}', name: 'day_filter')]
    public function filterByDay(
        $id,
        Request $request,DayRepository $dayRepository,
        DayStartRepository $dayStartRepository,ProgramRepository $programRepository,
    ): Response {
  
        $dayStartFilter = $dayStartRepository->findByDay($id);
        $programs = $programRepository->findAll();
        // $categorys = $categoryRepository->findAll();
        $days = $dayRepository->findAll();
        $dayStarts = $dayStartRepository->findBy(['day'=>$id]);
        // dd($categorys);
        return $this->render('day/start.html.twig', [
            'dayStartFilter' => $dayStartFilter,
            // 'categorys' => $categorys,
            'programs' => $programs,
            'days' => $days,
            'dayStarts' => $dayStarts,
        ]);
    }
}
