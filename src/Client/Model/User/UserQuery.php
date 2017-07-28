<?php

namespace Activiti\Client\Model\User;

use Activiti\Client\Model\AbstractQuery;

class UserQuery extends AbstractQuery
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $firstNameLike;
    private $lastNameLike;
    private $emailLike;
    private $memberOfGroup;
    private $potentialStarter;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getFirstNameLike()
    {
        return $this->firstNameLike;
    }

    public function setFirstNameLike($firstNameLike)
    {
        $this->firstNameLike = $firstNameLike;
    }

    public function getLastNameLike()
    {
        return $this->lastNameLike;
    }

    public function setLastNameLike($lastNameLike)
    {
        $this->lastNameLike = $lastNameLike;
    }

    public function getEmailLike()
    {
        return $this->emailLike;
    }

    public function setEmailLike($emailLike)
    {
        $this->emailLike = $emailLike;
    }

    public function getMemberOfGroup()
    {
        return $this->memberOfGroup;
    }

    public function setMemberOfGroup($memberOfGroup)
    {
        $this->memberOfGroup = $memberOfGroup;
    }

    public function getPotentialStarter()
    {
        return $this->potentialStarter;
    }

    public function setPotentialStarter($potentialStarter)
    {
        $this->potentialStarter = $potentialStarter;
    }
}
