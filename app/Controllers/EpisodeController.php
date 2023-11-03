<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Api;
use App\Response;

class EpisodeController
{
    private Api $api;

    public function __construct()
    {
        $this->api = new Api();
    }

    public function show(array $vars): Response
    {
        $id = (int)$vars['id'];

        $episode = $this->api->fetchEpisode($id);


        return new Response('episodes/show', [
            'episode' => $episode
        ]);
    }

    public function search(array $vars): Response
    {
        $search = $_GET['query'];

        $episodes = $this->api->fetchEpisodes();
        foreach ($episodes as $episode) {
            if ($episode->getEpisode() === $search) {
                return new Response('episodes/show', [
                    'episode' => $this->api->fetchEpisode($episode->getId())
                ]);
            }
        }
        return new Response('episodes/show', ['episode' => 'Episode not found!']);
    }
}
