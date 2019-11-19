<?php

namespace Nekra\ExampleComClient;


use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

abstract class ExampleClientBaseTest extends \PHPUnit\Framework\TestCase
{
    protected $requestHistory;

    protected function setUp() : void
    {
        $this->requestHistory = [];
    }

    /**
     * Создание клиента с подготовленными ответами
     *
     * @param array $responseQueue
     *
     * @return ExampleClient
     */
    protected function getMockClient(array $responseQueue)
    {
        $history = Middleware::history($this->requestHistory);

        $mock = new MockHandler($responseQueue);

        $handler = HandlerStack::create($mock);
        $handler->push($history);

        $client = new Client(['handler' => $handler]);

        return new ExampleClient($client);
    }
}
