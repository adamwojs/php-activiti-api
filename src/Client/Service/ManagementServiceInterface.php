<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\Management\Engine;
use Activiti\Client\Model\Management\EngineProperties;

interface ManagementServiceInterface
{
    /**
     * Return properties used internally in the engine.
     *
     * @see https://www.activiti.org/userguide/#_get_engine_properties
     *
     * @return EngineProperties
     */
    public function getProperties();

    /**
     * Returns the engine that is used in this REST-service.
     *
     * @see https://www.activiti.org/userguide/#_get_engine_info
     *
     * @return Engine
     */
    public function getEngine();
}
