<?php

namespace Activiti\Client\Model\Deployment;

use Activiti\Client\Model\ValueObject;

class ResourceData extends ValueObject
{
    public $id;
    public $url;
    public $contentUrl;
    public $mediaType;
    public $type;
}
