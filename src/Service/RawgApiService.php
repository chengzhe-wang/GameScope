<?php

// src/Service/RawgApiService.php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class RawgApiService
{
    private $client;
    private $apiKey;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
        $this->apiKey = '2c3307cf4c3e486883093047f82a2b23';  // Remplace avec ta propre clé si nécessaire
    }

    public function getGames($page = 1, $pageSize = 20)
    {
        $response = $this->client->request('GET', 'https://api.rawg.io/api/games', [
            'query' => [
                'key' => $this->apiKey,
                'page' => $page,
                'page_size' => $pageSize,
            ],
        ]);

        // Récupérer les données au format JSON
        return $response->toArray();
    }

    public function getGameDetails($gameId)
    {
        $response = $this->client->request('GET', 'https://api.rawg.io/api/games/'.$gameId, [
            'query' => [
                'key' => $this->apiKey,
            ],
        ]);

        return $response->toArray();
    }
}
