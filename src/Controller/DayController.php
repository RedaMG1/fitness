<?php

namespace App\Controller;

use App\Repository\DayRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DayController extends AbstractController
{
    #[Route('/day', name: 'app_day')]
    public function index(DayRepository $dayRepository): Response
    {
        $days = $dayRepository->findAll();
        return $this->render('day/index.html.twig', [
            'days' => $days,
        ]);
    }

    #[Route('/day/start', name: 'day_start')]
    public function start(DayRepository $dayRepository): Response
    {
        $days = $dayRepository->findAll();
        return $this->render('day/start.html.twig', [
            'days' => $days,
        ]);
    }
}
