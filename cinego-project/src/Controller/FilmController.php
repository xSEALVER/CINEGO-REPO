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
    $films = $filmRepository->findAll(); // Should return an array of Film objects

    // Ensure $films is iterable
    if (!is_iterable($films)) {
        $films = []; // Set as an empty array if it's not iterable
    }

    return $this->render('film/index.html.twig', [
        'films' => $films,
    ]);
}

}

