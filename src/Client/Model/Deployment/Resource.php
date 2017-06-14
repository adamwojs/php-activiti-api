<?php

namespace Activiti\Client\Model\Deployment;

use Activiti\Client\Model\ValueObject;

class Resource extends ValueObject
{
    public $id;
    public $url;
    public $contentUrl;
    public $mediaType;
    public $type;
}
