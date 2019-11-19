<?php

namespace Nekra\ExampleComClient;


use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class ExampleClientUpdateTest extends ExampleClientBaseTest
{
    public function testUpdateComment()
    {
        $client = $this->getMockClient([
            new Response(200),
        ]);

        $comment = new Comment([
            'id'   => 1,
            'name' => 'text1',
            'text' => 'text2',
        ]);

        $client->updateComment($comment);

        $this->assertEquals(1, count($this->requestHistory));

        /** @var Request $request */
        $request = $this->requestHistory[0]['request'];

        $this->assertEquals('PATCH', $request->getMethod());
        $this->assertEquals('/comment/'.$comment->id, $request->getUri()->getPath());

        $body = json_decode((string)$request->getBody());
        $this->assertEquals('text1', $body->name);
        $this->assertEquals('text2', $body->text);
    }
}
