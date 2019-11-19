<?php

namespace Nekra\ExampleComClient;


use GuzzleHttp\Client;

class ExampleClient
{
    /**
     * @var Client
     */
    private $client;


    /**
     * ExampleClient constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     */
    public function getComments()
    {
        $response = $this->client->get('/comments');

        $respComments = json_decode((string)$response->getBody(), true);

        // Нам нужно чтобы возвращался массив объектов Comments
        $result = [];
        foreach ($respComments as $respComment) {
            $comment = new Comment($respComment);

            $result[] = $comment;
        }

        return $result;
    }
}