<?php
/**
 * Created by PhpStorm.
 * User: 9nekr
 * Date: 19.11.2019
 * Time: 20:11
 */

namespace Nekra\ExampleComClient;


use GuzzleHttp\Client;

class ExampleClientBuilder
{
    public static function create(string $baseUri = 'http://example.com')
    {
        $client = new Client(['base_uri' => $baseUri]);

        return new ExampleClient($client);
    }
}