<?php
class ECB_Model_JobStatusTable extends Doctrine_Record
{
    const WIP = 4;
    const COMPLETE = 5;


    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_JobStatus');
    }

    public function getPairs()
    {
        $query = $this->getInstance()
            ->createQuery('js')
            ->select('js.jobStatusId, js.label');
        $statuses = $query->execute();

        $array = array();
        foreach ($statuses as $status) {
            $array[$status->jobStatusId] = $status->label;
        }

        return $array;
    }

}