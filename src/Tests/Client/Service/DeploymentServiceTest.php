<?php

namespace Activiti\Tests\Client\Service;

use Activiti\Client\Model\Deployment\Deployment;
use Activiti\Client\Model\Deployment\DeploymentList;
use Activiti\Client\Model\Deployment\DeploymentQuery;
use Activiti\Client\ModelFactoryInterface;
use Activiti\Client\Service\DeploymentService;
use Activiti\Client\ObjectSerializerInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;

class DeploymentServiceTest extends AbstractServiceTest
{
    public function testGetDeploymentList()
    {
        $expected = [
            'data' => [
                [
                    'id' => '10',
                    'name' => 'activiti-examples.bar',
                    'deploymentTime' => '2010-10-13T14:54:26.750+02:00',
                    'category' => 'examples',
                    'url' => 'http://localhost:8081/service/repository/deployments/10',
                    'tenantId' => null,
                ],
            ],
            'total' => 1,
            'start' => 0,
            'sort' => 'id',
            'order' => 'asc',
            'size' => 1,
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));

        $actual = $this
            ->createDeploymentService($client)
            ->getDeploymentList(new DeploymentQuery());

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('repository/deployments');
    }

    public function testGetDeployment()
    {
        $deploymentId = 10;

        $expected = [
            'id' => $deploymentId,
            'name' => 'activiti-examples.bar',
            'deploymentTime' => '2010-10-13T14:54:26.750+02:00',
            'category' => 'examples',
            'url' => 'http://localhost:8081/service/repository/deployments/10',
            'tenantId' => null,
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 200));

        $actual = $this
            ->createDeploymentService($client)
            ->getDeployment($deploymentId);

        $this->assertRequestMethod('GET');
        $this->assertRequestUri('repository/deployments/' . $deploymentId);
    }

    public function testCreateDeployment()
    {
        $deployment = null;

        $expected = [
            'id' => '10',
            'name' => 'activiti-examples.bar',
            'deploymentTime' => '2010-10-13T14:54:26.750+02:00',
            'category' => 'examples',
            'url' => 'http://localhost:8081/service/repository/deployments/10',
            'tenantId' => null,
        ];

        $client = $this->createClient($this->createJsonResponse($expected, 201));

        $actual = $this
            ->createDeploymentService($client)
            ->createDeployment($deployment);

        $this->assertRequestMethod('POST');
        $this->assertRequestUri('repository/deployments');
        $this->assertRequestContentType('multipart/form-data');
        // TODO: Assert POST repository/deployments body
    }

    public function testDelete()
    {
        $deploymentId = 10;

        $client = $this->createClient(new Response(204));

        $actual = $this
            ->createDeploymentService($client)
            ->delete($deploymentId);

        $this->assertRequestMethod('DELETE');
        $this->assertRequestUri('repository/deployments/' . $deploymentId);
        $this->assertNull($actual);
    }

    private function createDeploymentService(ClientInterface $client)
    {
        $modelFactory = $this->createMock(ModelFactoryInterface::class);
        $objectSerializer = $this->createMock(ObjectSerializerInterface::class);

        return new DeploymentService($client, $modelFactory, $objectSerializer);
    }
}
