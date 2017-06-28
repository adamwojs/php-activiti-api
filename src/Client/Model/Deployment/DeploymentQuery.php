<?php

namespace Activiti\Client\Model\Deployment;

use Activiti\Client\Model\AbstractQuery;

class DeploymentQuery extends AbstractQuery
{
    public $name;
    public $nameLike;
    public $category;
    public $categoryNotEquals;
    public $tenantId;
    public $tenantIdLike;
    public $withoutTenantId;
}
