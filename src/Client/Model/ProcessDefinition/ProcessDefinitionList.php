<?php

namespace Activiti\Client\Model\ProcessDefinition;

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
