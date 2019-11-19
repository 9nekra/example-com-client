<?php

namespace Nekra\ExampleComClient;


use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class ExampleClientPostTest extends ExampleClientBaseTest
{
    /**
     *
     */
    public function testPostComment()
    {
        $client = $this->getMockClient([
            new Response(200),
        ]);

        $comment = new Comment([
            'name' => 'text1',
            'text' => 'text2',
        ]);

        $client->postComment($comment);

        $this->assertEquals(1, count($this->requestHistory));

        /** @var Request $request */
        $request = $this->requestHistory[0]['request'];

        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('/comment', $request->getUri()->getPath());

        $body = json_decode((string)$request->getBody());

        // Проверяем что не передается id в теле запроса
        $this->assertFalse(property_exists($body, 'id'), 'Передали id в теле запроса');

        $this->assertEquals('text1', $body->name);
        $this->assertEquals('text2', $body->text);
    }
}
