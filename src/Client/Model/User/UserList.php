<?php

namespace Activiti\Client\Model\User;

use Activiti\Client\Model\AbstractList;

class UserList extends AbstractList
{
    public function __construct(array $response = [])
    {
        parent::__construct($response);

        foreach ($response['data'] as $item) {
            $this->data[] = new User($item);
        }
    }
}
