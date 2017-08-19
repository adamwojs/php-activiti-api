<?php

namespace Activiti\Client\Model\ProcessDefinition;

use Activiti\Client\Model\AbstractQuery;

class ProcessDefinitionQuery extends AbstractQuery
{
    private $version;
    private $name;
    private $nameLike;
    private $key;
    private $keyLike;
    private $resourceName;
    private $resourceNameLike;
    private $category;
    private $categoryLike;
    private $categoryNotEquals;
    private $deploymentId;
    private $startableByUser;
    private $latest;
    private $suspended;

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion($version)
    {
        $this->version = $version;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getNameLike()
    {
        return $this->nameLike;
    }

    public function setNameLike($nameLike)
    {
        $this->nameLike = $nameLike;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setKey($key)
    {
        $this->key = $key;
    }

    public function getKeyLike()
    {
        return $this->keyLike;
    }

    public function setKeyLike($keyLike)
    {
        $this->keyLike = $keyLike;
    }

    public function getResourceName()
    {
        return $this->resourceName;
    }

    public function setResourceName($resourceName)
    {
        $this->resourceName = $resourceName;
    }

    public function getResourceNameLike()
    {
        return $this->resourceNameLike;
    }

    public function setResourceNameLike($resourceNameLike)
    {
        $this->resourceNameLike = $resourceNameLike;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getCategoryLike()
    {
        return $this->categoryLike;
    }

    public function setCategoryLike($categoryLike)
    {
        $this->categoryLike = $categoryLike;
    }

    public function getCategoryNotEquals()
    {
        return $this->categoryNotEquals;
    }

    public function setCategoryNotEquals($categoryNotEquals)
    {
        $this->categoryNotEquals = $categoryNotEquals;
    }

    public function getDeploymentId()
    {
        return $this->deploymentId;
    }

    public function setDeploymentId($deploymentId)
    {
        $this->deploymentId = $deploymentId;
    }

    public function getStartableByUser()
    {
        return $this->startableByUser;
    }

    public function setStartableByUser($startableByUser)
    {
        $this->startableByUser = $startableByUser;
    }

    public function getLatest()
    {
        return $this->latest;
    }

    public function setLatest($latest)
    {
        $this->latest = $latest;
    }

    public function getSuspended()
    {
        return $this->suspended;
    }

    public function setSuspended($suspended)
    {
        $this->suspended = $suspended;
    }
}
