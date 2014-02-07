<?php
class ECB_Model_JobTable extends Doctrine_Record
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_Job');
    }

    public function getJobs(array $status, array $process = array())
    {
        $query = $this->getInstance()->createQuery('j')
                ->whereIn('jobStatusId', $status)
                ->orderBy('CASE jobSource WHEN "TMI" THEN 1 ELSE 2 END ');
        if ($process) {
            $query->whereIn('jobProcessId', $process);
        }
        return $query->execute();
    }

}