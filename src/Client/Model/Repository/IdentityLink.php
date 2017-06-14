<?php

namespace Activiti\Client\Model\Repository;

use Activiti\Client\Model\ValueObject;

class IdentityLink extends ValueObject
{
    public $url;
    public $user;
    public $group;
    public $type;
}
