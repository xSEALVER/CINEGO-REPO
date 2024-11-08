<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{
    #[Route('/films', name: 'app_films')]
    public function index(FilmRepository $filmRepository): Response
    {
        // Fetch films from the database
        $films = $filmRepository->findAll();

        // Pass films to the template
        return $this->render('film/index.html.twig', [
            'films' => $films
        ]);
    }
}

