<?php
class ECB_Model_JobProcessTable extends Doctrine_Record
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_JobProcess');
    }

    public function getPairs()
    {
        $query = $this->getInstance()
            ->createQuery('jp')
            ->select('jp.jobProcessId, jp.label');
        $processes = $query->execute();

        $array = array();
        foreach ($processes as $process) {
            $array[$process->jobProcessId] = $process->label;
        }

        return $array;
    }

}