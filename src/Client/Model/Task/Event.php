<?php

namespace Activiti\Client\Model\Task;

use Activiti\Client\Model\ValueObject;

class Event extends ValueObject
{
    public $id;
    public $action;
    public $message;
    public $taskUrl;
    public $time;
    public $url;
    public $userId;
}