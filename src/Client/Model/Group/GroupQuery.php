<?php

namespace Activiti\Client\Model\Group;

use Activiti\Client\Model\AbstractQuery;

class GroupQuery extends AbstractQuery
{
    public $id;
    public $name;
    public $type;
    public $nameLike;
    public $member;
    public $potentialStarter;
}
