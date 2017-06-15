<?php

namespace Activiti\Client\Model\Deployment;

use Activiti\Client\Model\ValueObject;

class DeploymentQuery extends ValueObject
{
    public $name;
    public $nameLike;
    public $category;
    public $categoryNotEquals;
    public $tenantId;
    public $tenantIdLike;
    public $withoutTenantId;
    public $sort;
}
