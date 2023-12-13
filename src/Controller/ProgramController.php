<?php

namespace App\Controller;

use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProgramController extends AbstractController
{
    #[Route('/program', name: 'app_program')]
    public function index(ProgramRepository $programRepository,Security $security): Response
    {
        $loggedUser = $security->getUser();
        $programs = $programRepository->findBy(['user'=>$loggedUser]);
        return $this->render('program/index.html.twig', [
            'programs' => $programs,
        ]);
    }
}
