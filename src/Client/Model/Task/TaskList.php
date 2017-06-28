<?php

namespace Activiti\Client\Model\Task;

use Activiti\Client\Model\AbstractList;

class TaskList extends AbstractList
{
    public function __construct(array $response = [])
    {
        parent::__construct($response);

        foreach ($response['data'] as $item) {
            $this->data[] = new Task($item);
        }
    }
}