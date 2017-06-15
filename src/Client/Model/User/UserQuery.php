<?php

namespace Activiti\Client\Model\User;

use Activiti\Client\Model\ValueObject;

class UserQuery extends ValueObject
{
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $firstNameLike;
    public $lastNameLike;
    public $emailLike;
    public $memberOfGroup;
    public $potentialStarter;
    public $sort;
}
