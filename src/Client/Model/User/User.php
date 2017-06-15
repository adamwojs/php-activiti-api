<?php

namespace Activiti\Client\Model\User;

use Activiti\Client\Model\ValueObject;

class User extends ValueObject
{
    public $id;
    public $firstName;
    public $lastName;
    public $url;
    public $email;
}
