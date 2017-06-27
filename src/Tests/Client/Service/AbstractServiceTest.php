<?php

namespace Activiti\Tests\Client\Service;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

abstract class AbstractServiceTest extends TestCase
{
    /**
     * @var array
     */
    private $history;

    protected function createActivitiErrorResponse($statusCode, $message = null)
    {
        return new Response($statusCode, [], json_encode([
            'statusCode' => $statusCode,
            'message' => $message
        ]));
    }

    /**
     * @param array|null $queue
     * @return ClientInterface
     */
    protected function createClient(array $queue = null)
    {
        $this->history = [];

        $stack = HandlerStack::create(new MockHandler($queue));
        $stack->push(Middleware::history($this->history));

        return new Client(['handler' => $stack]);
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
