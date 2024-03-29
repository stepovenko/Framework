<?php


namespace Tests\Framework\Http;


use Framework\Http\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function testEmpty()
    {
        $response = new Response($body = 'body');

        $this->assertEquals($body, $response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Ok', $response->getReasonPhrase());
    }

    public function test404()
    {
        $response = new Response($body = 'Empty', $status = 404);

        $this->assertEquals($body, $response->getBody());
        $this->assertEquals($status, $response->getStatusCode());
        $this->assertEquals('Not Found', $response->getReasonPhrase());
    }

    public function testHeaders()
    {
        $response = (new Response($body = ''))
            ->withHeader($name1 = 'X-Header-1', $value1 = 'value-1')
            ->withHeader($name2 = 'X-Header-2', $value2 = 'value-2');

        $this->assertEquals([$name1 => $value1, $name2 => $value2], $response->getHeaders());
    }
}