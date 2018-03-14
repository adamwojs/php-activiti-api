<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\History\HistoryActivityInstance;
use Activiti\Client\Model\History\HistoryQuery;
use GuzzleHttp\ClientInterface;

class HistoryService extends AbstractService implements HistoryServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function queryHistoryInstances(HistoryQuery $historyQuery = null)
    {
        return $this->call(function (ClientInterface $client) use ($historyQuery) {
            return $client->request('POST', 'query/historic-activity-instances', [
                'json' => $historyQuery,
            ]);
        }, HistoryActivityInstance::class);
    }
}
