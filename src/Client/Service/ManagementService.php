<?php

namespace Activiti\Client\Service;

class ManagementService extends AbstractService implements ManagementServiceInterface
{
    /**
     * @inheritdoc
     */
    public function getEngine()
    {
        return $this->gateway->execute('management/engine');
    }

    /**
     * @inheritdoc
     */
    public function getProperties()
    {
        return $this->gateway->execute('management/properties');
    }
}
