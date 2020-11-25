<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
/**
 * Description of JsonController
 *
 * @author Sławomir
 */
class JsonController {
        private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
     /**
     * @Route("/json", name="json", methods={"GET"})
     */
    public function fetchGitHubInformation(): JsonResponse
    {
        $response = $this->client->request(
            'GET',
            'https://api.github.com/repos/symfony/symfony-docs'
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        //$contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
       $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
       $content=new JsonResponse($response->toArray());
        return $content;
    }
}
    //put your code here

