<?php

namespace Activiti\Client\Model\Group;

use Activiti\Client\Model\AbstractList;

class GroupList extends AbstractList
{
    public function __construct(array $response = [])
    {
        parent::__construct($response);

        foreach ($response['data'] as $item) {
            $this->data[] = new Group($item);
        }
    }
}
