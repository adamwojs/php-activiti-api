<?php

namespace Activiti\Client\Service;

use Activiti\Client\Exception\ActivitiException;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use function GuzzleHttp\json_decode;

abstract class AbstractService
{
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    protected function call(callable $callable, $responseClass = null)
    {
        try {
            /** @var ResponseInterface $response */
            $response = $callable($this->client);

            if ($responseClass !== null) {
                return new $responseClass(json_decode(
                    $response->getBody()->getContents(), true
                ));
            }

            return $response->getBody()->getContents();
        } catch (RequestException $ex) {
            throw new ActivitiException($ex->getMessage(), 0, $ex);
        }
    }
}
