<?php

namespace Activiti\Client\Service;

use Activiti\Client\Exception\ActivitiException;
use Activiti\Client\Model\ModelFactoryInterface;
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

    /**
     * @var ModelFactoryInterface
     */
    private $modelFactory;

    /**
     * @var ObjectSerializerInterface
     */
    protected $serializer;

    public function __construct(ClientInterface $client, ModelFactoryInterface $modelFactory, ObjectSerializerInterface $objectSerializer)
    {
        $this->client = $client;
        $this->modelFactory = $modelFactory;
        $this->serializer = $objectSerializer;
    }

    protected function call(callable $callable, $class = null)
    {
        try {
            /** @var ResponseInterface $response */
            $response = $callable($this->client);

            $contents = $response->getBody()->getContents();
            if ($class !== null) {
                return $this->hydrate($class, $this->decode($contents));
            }

            return $contents;
        } catch (RequestException $ex) {
            throw new ActivitiException($ex->getMessage(), 0, $ex);
        }
    }

    /**
     * Decode API response
     *
     * @param string $contents
     * @return array
     */
    protected function decode($contents)
    {
        return json_decode($contents, true);
    }

    /**
     * Hydrate response
     *
     * @param string $class
     * @param array $data
     * @return object
     */
    protected function hydrate($class, array $data)
    {
        return $this->modelFactory->{'create' . $this->getClassShortName($class)}($data);
    }

    private function getClassShortName($class)
    {
        $parts = explode('\\', $class);
        return array_pop($parts);
    }
}
