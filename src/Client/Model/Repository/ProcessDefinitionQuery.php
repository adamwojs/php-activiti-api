<?php

namespace Activiti\Client\Model\Repository;

use Activiti\Client\Model\AbstractQuery;

class ProcessDefinitionQuery extends AbstractQuery
{
    public $version;
    public $name;
    public $nameLike;
    public $key;
    public $keyLike;
    public $resourceName;
    public $resourceNameLike;
    public $category;
    public $categoryLike;
    public $categoryNotEquals;
    public $deploymentId;
    public $startableByUser;
    public $latest;
    public $suspended;
}
