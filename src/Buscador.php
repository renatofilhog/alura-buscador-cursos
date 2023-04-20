<?php

namespace Alura\BuscadorCurso;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private $httpClient;
    private $crawler;

    public function __construct(ClientInterface $client, Crawler $crawler)
    {
        $this->httpClient = $client;
        $this->crawler = $crawler;
    }

    public function buscar(string $url): array
    {
        $cursos = [];
        $resposta = $this->httpClient->request('GET', $url);
        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);
        $ElementosCursos = $this->crawler->filter('span.card-curso__nome');
        foreach ($ElementosCursos as $item) {
            $cursos[] = $item->textContent;
        }
        return $cursos;
    }
}
