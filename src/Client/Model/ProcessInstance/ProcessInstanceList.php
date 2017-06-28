<?php

namespace Activiti\Client\Model\ProcessInstance;

use Activiti\Client\Model\AbstractList;

class ProcessInstanceList extends AbstractList
{
    public function __construct(array $response = [])
    {
        parent::__construct($response);

        foreach ($response['data'] as $item) {
            $this->data[] = new ProcessInstance($item);
        }
    }
}
