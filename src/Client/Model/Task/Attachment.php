<?php

namespace Activiti\Client\Model\Task;

use Activiti\Client\Model\ValueObject;

class Attachment extends ValueObject
{
    public $id;
    public $url;
    public $name;
    public $userId;
    public $description;
    public $type;
    public $taskUrl;
    public $processInstanceUrl;
    public $externalUrl;
    public $contentUrl;
}