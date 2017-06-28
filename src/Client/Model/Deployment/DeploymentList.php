<?php

namespace Activiti\Client\Model\Deployment;

use Activiti\Client\Model\AbstractList;

class DeploymentList extends AbstractList
{
    public function __construct(array $response = [])
    {
        parent::__construct($response);

        foreach ($response['data'] as $item) {
            $this->data[] = new Deployment($item);
        }
    }
}
