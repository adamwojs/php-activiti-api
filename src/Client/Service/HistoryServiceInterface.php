<?php

namespace Activiti\Client\Service;

use Activiti\Client\Model\History\HistoryQuery;

interface HistoryServiceInterface
{
    /**
     * Query for historic activity instances
     *
     * @see https://www.activiti.org/userguide/#_query_for_historic_activity_instances
     *
     * @param HistoryQuery $historyQuery
     * @return mixed
     */
    public function queryHistoryInstances(HistoryQuery $historyQuery);


    /**
     * List of historic process instances
     *
     * @see https://www.activiti.org/userguide/#restHistoricProcessInstancesGet
     *
     * @param HistoryQuery $historyQuery
     * @return mixed
     */
    public function getHistoryProcessInstanceList(HistoryQuery $historyQuery);

    /**
     * Get historic task instances
     *
     * @see https://www.activiti.org/userguide/#restHistoricTaskInstancesGet
     *
     * @param HistoryQuery $historyQuery
     * @return mixed
     */
    public function historyTask(HistoryQuery $historyQuery);
}
