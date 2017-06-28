<?php

namespace Activiti\Client\Model\Repository;

use Activiti\Client\Model\AbstractList;

class ProcessDefinitionList extends AbstractList
{
    public function __construct(array $response = [])
    {
        parent::__construct($response);

        foreach ($response['data'] as $item) {
            $this->data[] = new ProcessDefinition($item);
        }
    }
}
