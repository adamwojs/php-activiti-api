<?php

namespace Activiti\Tests;

use PHPUnit_Framework_Assert;
use Psr\Http\Message\RequestInterface;

trait RequestAssertTrait
{
    public function assertRequestMethod($method, RequestInterface $request = null)
    {
        if ($request === null) {
            $request = $this->getLastRequest();
        }

        PHPUnit_Framework_Assert::assertEquals($method, $request->getMethod());
    }

    public function assertRequestUri($uri, RequestInterface $request = null)
    {
        if ($request === null) {
            $request = $this->getLastRequest();
        }

        PHPUnit_Framework_Assert::assertEquals($uri, (string)$request->getUri());
    }

    public function assertRequestJsonPayload($payload, RequestInterface $request = null)
    {
        if ($request === null) {
            $request = $this->getLastRequest();
        }

        PHPUnit_Framework_Assert::assertEquals(
            'application/json',
            $request->getHeaderLine('Content-Type')
        );

        PHPUnit_Framework_Assert::assertJsonStringEqualsJsonString(
            json_encode($payload),
            $request->getBody()->getContents()
        );
    }

    public function assertRequestContentType($contentType, RequestInterface $request = null)
    {
        if ($request === null) {
            $request = $this->getLastRequest();
        }

        if ($contentType === 'multipart/form-data') {
            PHPUnit_Framework_Assert::assertStringStartsWith(
                'multipart/form-data', $request->getHeaderLine('Content-Type')
            );
        } else {
            PHPUnit_Framework_Assert::assertEquals($contentType, $request->getHeaderLine('Content-Type'));
        }
    }

    abstract public function getLastRequest();
}
