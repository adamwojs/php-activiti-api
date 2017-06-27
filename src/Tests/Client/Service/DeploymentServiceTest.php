<?php

namespace Activiti\Tests\Client\Service;

use Activiti\Client\Model\Deployment\Deployment;
use Activiti\Client\Model\Deployment\DeploymentList;
use Activiti\Client\Model\Deployment\DeploymentQuery;
use Activiti\Client\Service\DeploymentService;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;

class DeploymentServiceTest extends AbstractServiceTest
{
    public function testGetDeploymentList()
    {
        $expected = [
            'data' =>
                [
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

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createDeploymentService($client)
            ->getDeploymentList(new DeploymentQuery([

            ]));

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals('repository/deployments', $this->getLastRequest()->getUri());
        $this->assertEquals(new DeploymentList($expected), $actual);
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
            'tenantId' => NULL,
        ];

        $client = $this->createClient([
            new Response(200, [], json_encode($expected))
        ]);

        $actual = $this
            ->createDeploymentService($client)
            ->getDeployment($deploymentId);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('GET', $this->getLastRequest()->getMethod());
        $this->assertEquals('repository/deployments/' . $deploymentId, $this->getLastRequest()->getUri());
        $this->assertEquals(new Deployment($expected), $actual);
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
            'tenantId' => NULL,
        ];

        $client = $this->createClient([
            new Response(201, [], json_encode($expected))
        ]);

        $actual = $this
            ->createDeploymentService($client)
            ->createDeployment($deployment);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('POST', $this->getLastRequest()->getMethod());
        $this->assertEquals('repository/deployments', $this->getLastRequest()->getUri());
        $this->assertStringStartsWith('multipart/form-data', $this->getLastRequest()->getHeader('Content-Type')[0]);
        // TODO: Assert POST repository/deployments body
    }

    public function testDelete()
    {
        $deploymentId = 10;

        $client = $this->createClient([
            new Response(204)
        ]);

        $actual = $this
            ->createDeploymentService($client)
            ->delete($deploymentId);

        $this->assertCount(1, $this->getHistory());
        $this->assertEquals('DELETE', $this->getLastRequest()->getMethod());
        $this->assertEquals('repository/deployments/' . $deploymentId, $this->getLastRequest()->getUri());
        $this->assertNull($actual);
    }

    private function createDeploymentService(ClientInterface $client)
    {
        return new DeploymentService($client);
    }
}