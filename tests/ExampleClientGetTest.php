<?php

namespace Nekra\ExampleComClient;

use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class ExampleClientGetTest extends ExampleClientBaseTest
{
    /**
     * Проверяем что если нету комментариев на сервере вернеться пустой массив
     */
    public function testGetZeroComments()
    {
        $exampleClient = $this->getMockClient([
            new Response(200, [], json_encode([])),
        ]);

        $comments = $exampleClient->getComments();

        $this->assertEquals(0, count($comments));
    }

    /**
     * Проверяем что правильно отправляем get запрос
     */
    public function testGetRequest()
    {
        $exampleClient = $this->getMockClient([
            new Response(200, [], json_encode([])),
        ]);

        $exampleClient->getComments();

        $this->assertEquals(1, count($this->requestHistory));
        /** @var Request $request */
        $request = $this->requestHistory[0]['request'];

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('/comments', $request->getUri()->getPath());
    }

    /**
     * Проверяем что метод getComment возвщает массив комментов
     */
    public function testGetOneComment()
    {
        $originalComments = [
            new Comment([
                'id'   => 1,
                'name' => 'text1',
                'text' => 'text2',
            ]),
        ];

        $exampleClient = $this->getMockClient([
            new Response(200, [], json_encode($originalComments)),
        ]);

        $comments = $exampleClient->getComments();

        $this->assertEquals(1, count($comments));
        $this->assertInstanceOf(Comment::class, $comments[0]);

        $this->assertEquals(1, $comments[0]->id);
        $this->assertEquals('text1', $comments[0]->name);
        $this->assertEquals('text2', $comments[0]->text);
    }

    /**
     * Проверяем что сервер вызывает стандартные исключения при проблемах с сервером example.com
     */
    public function testGetError()
    {
        $exampleClient = $this->getMockClient([
            new Response(500, [], 'Service unavailable'),
        ]);

        $this->expectException(ServerException::class);
        $exampleClient->getComments();
    }
}
