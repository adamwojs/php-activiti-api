<?php

namespace Activiti\Client\Model\Group;

use Activiti\Client\Model\ValueObject;

class GroupQuery extends ValueObject
{
    public $id;
    public $name;
    public $type;
    public $nameLike;
    public $member;
    public $potentialStarter;
    public $sort;
}
