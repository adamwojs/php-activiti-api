<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\History\HistoryActivityInstance;
use Activiti\Client\Model\History\HistoryQuery;
use Activiti\Client\Model\ProcessInstance\ProcessInstanceList;
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
                'json' => array_filter($this->serializer->serialize($historyQuery)),
            ]);
        }, HistoryActivityInstance::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getHistoryProcessInstanceList(HistoryQuery $historyQuery)
    {
        return $this->call(function (ClientInterface $client) use ($historyQuery) {
            return $client->request('GET', 'history/historic-process-instances', [
                'query' => $this->serializer->serialize($historyQuery),
            ]);
        }, ProcessInstanceList::class);
    }

    /**
     * {@inheritdoc}
     */
    public function historyTask(HistoryQuery $historyQuery)
    {
        return $this->call(function (ClientInterface $client) use ($historyQuery) {
            return $client->request('GET', 'history/historic-task-instances', [
                'query' => $this->serializer->serialize($historyQuery),
            ]);
        }, ProcessInstanceList::class);
    }
}
