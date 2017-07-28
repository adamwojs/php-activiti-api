<?php

namespace Activiti\Client\Model\Group;

use Activiti\Client\Model\AbstractQuery;

class GroupQuery extends AbstractQuery
{
    private $id;
    private $name;
    private $type;
    private $nameLike;
    private $member;
    private $potentialStarter;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getNameLike()
    {
        return $this->nameLike;
    }

    public function setNameLike($nameLike)
    {
        $this->nameLike = $nameLike;
    }

    public function getMember()
    {
        return $this->member;
    }

    public function setMember($member)
    {
        $this->member = $member;
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
