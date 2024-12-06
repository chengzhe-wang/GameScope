<?php

// src/Controller/RawgController.php

namespace App\Controller;

use App\Service\RawgApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RawgController extends AbstractController
{
    private $rawgApiService;

    public function __construct(RawgApiService $rawgApiService)
    {
        $this->rawgApiService = $rawgApiService;
    }

    

    #[Route("/games/list", name:"games_list")]
    public function listGames(): Response
    {
        // Appel à l'API RAWG pour récupérer les jeux
        $games = $this->rawgApiService->getGames();

        // Retourner la vue avec les jeux récupérés
        return $this->render('game/list.html.twig', [
            'games' => $games['results'], // Liste des jeux retournée par l'API
        ]);
    }

    #[Route("/games/detail", name:"games_detail")]
    public function gameDetails($id): Response
    {
        // Appel à l'API RAWG pour récupérer les détails du jeu
        $game = $this->rawgApiService->getGameDetails($id);

        return $this->render('game/details.html.twig', [
            'game' => $game,
        ]);
    }
}
