<?php

namespace Activiti\Client\Model\User;

use Activiti\Client\Model\AbstractQuery;

class UserQuery extends AbstractQuery
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
}
