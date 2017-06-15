<?php

namespace Activiti\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;

class GuzzleGateway implements GatewayInterface
{
    const SERVICE_DESCRIPTION_PATH = __DIR__ . '/activiti-api-description.php';

    /**
     * @var GuzzleClient
     */
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = new GuzzleClient($client, $this->getServiceDescription());
    }

    protected function getServiceDescription()
    {
        return new Description(include self::SERVICE_DESCRIPTION_PATH);
    }

    /**
     * @inheritdoc
     */
    public function execute($name, array $args = [])
    {
        try {
            $response = $this->client->execute(
                $this->client->getCommand($name, $args)
            );

            $class = $this->client
                ->getDescription()
                ->getOperation($name)
                ->getResponseModel();

            return new $class($response->toArray());
        } catch (\Exception $ex) {
            // TODO: Error handling
            throw $ex;
        }
    }
}
