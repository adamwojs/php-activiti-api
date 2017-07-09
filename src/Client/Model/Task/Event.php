<?php

namespace Activiti\Client\Model\Task;

use Activiti\Client\Model\ValueObject;

class Event extends ValueObject
{
    public $id;
    public $url;
    public $action;
    public $userId;
    public $time;
    public $taskUrl;
    public $processInstanceUrl;
    public $message;
}
