<?php

namespace Activiti\Tests\Client\Service;

use Activiti\Client\ObjectSerializerInterface;
use Activiti\Tests\RequestAssertTrait;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractServiceTest extends TestCase
{
    use RequestAssertTrait;

    /**
     * @var array
     */
    private $history;

    /**
     * @param ResponseInterface[] $responses
     * @return ClientInterface
     */
    protected function createClient(ResponseInterface ...$responses)
    {
        $this->history = [];

        $stack = HandlerStack::create(new MockHandler($responses));
        $stack->push(Middleware::history($this->history));

        return new Client(['handler' => $stack]);
    }

    protected function createObjectSerializerMock($argument, array $return)
    {
        $mock = $this->createMock(ObjectSerializerInterface::class);
        $mock
            ->expects($this->once())
            ->method('serialize')
            ->with($argument)
            ->willReturn($return);

        return $mock;
    }

    protected function createJsonResponse($data, $statusCode = 200)
    {
        return new Response($statusCode, [
            'Content-Type' => 'application/json',
        ], json_encode($data));
    }

    protected function createActivitiErrorResponse($statusCode, $message = null)
    {
        return $this->createJsonResponse([
            'statusCode' => $statusCode,
            'message' => $message,
        ], $statusCode);
    }

    /**
     * @return RequestInterface
     */
    protected function getLastRequest()
    {
        if (!empty($this->history)) {
            return $this->history[count($this->history) - 1]['request'];
        }

        return null;
    }

    /**
     * @return array
     */
    protected function getHistory()
    {
        return $this->history;
    }
}
