<?php

use Alura\BuscadorCurso\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

require 'vendor/autoload.php';

$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);

iterarCursos(
    $cursos = $buscador->buscar('/cursos-online-programacao/php')
);

?>