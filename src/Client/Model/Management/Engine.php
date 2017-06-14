<?php

namespace Activiti\Client\Model\Management;

use Activiti\Client\Model\ValueObject;

class Engine extends ValueObject
{
    public $name;
    public $resourceUrl;
    public $exception;
    public $version;
}
