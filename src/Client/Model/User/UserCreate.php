<?php

namespace Activiti\Client\Model\User;

use Activiti\Client\Model\ValueObject;

class UserCreate extends ValueObject
{
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
}
