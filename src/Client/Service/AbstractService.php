<?php

namespace Activiti\Client\Service;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Command\Guzzle\GuzzleClient;

abstract class AbstractService
{
    /**
     * @var GuzzleClient
     */
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = new GuzzleClient($client, $this->getServiceDescription());
    }

    protected abstract function getServiceDescription();
}
