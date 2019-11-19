<?php
/**
 * Created by PhpStorm.
 * User: 9nekr
 * Date: 19.11.2019
 * Time: 20:15
 */

namespace Nekra\ExampleComClient;


class ExampleClientBuilderTest extends \PHPUnit\Framework\TestCase
{
    public function testCustomUriBuilder()
    {
        $client  = ExampleClientBuilder::create('http://ex.com');
        $baseUri = $client->getGuzzleClient()->getConfig('base_uri');

        $this->assertEquals('ex.com', $baseUri->getHost());
    }

    public function testDefaultUriBuilder()
    {
        $client  = ExampleClientBuilder::create();
        $baseUri = $client->getGuzzleClient()->getConfig('base_uri');

        $this->assertEquals('example.com', $baseUri->getHost());
    }
}
