<?php

namespace Activiti\Client\Model\User;

use Activiti\Client\Model\ValueObject;

class UserUpdate extends ValueObject
{
    public $firstName;
    public $lastName;
    public $email;
    public $password;
}
