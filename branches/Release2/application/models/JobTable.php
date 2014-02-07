<?php
class ECB_Model_JobTable extends Doctrine_Record
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_Job');
    }

    public function getJobs(array $status = array(), array $process = array())
    {
        $query = $this->getInstance()->createQuery('j')
                ->orderBy('CASE jobSource WHEN "TMI" THEN 1 ELSE 2 END, dateModified DESC');

        if ($status) {
            $query->whereIn('jobStatusId', $status);
        }

        if ($process) {
            $query->whereIn('jobProcessId', $process);
        }

        return $query->execute();
    }

}