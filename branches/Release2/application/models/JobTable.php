<?php
class ECB_Model_JobTable extends Doctrine_Record
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_Job');
    }

    public function getJobs(array $status = array(), array $process = array(), $keyword = null)
    {
        $query = $this->getInstance()->createQuery('j')
                ->orderBy('CASE jobSource WHEN "TMI" THEN 1 ELSE 2 END, dateModified DESC');

        //filters
        $status = array_filter($status);
        $process = array_filter($process);

        if (!empty($status)) {
            $query->whereIn('jobStatusId', $status);
        }

        if (!empty($process)) {
            $query->whereIn('jobProcessId', $process);
        }

        if ($keyword) {
            $query->where('carReg LIKE ?', '%'.$keyword.'%')
                ->orWhere('name LIKE ?', '%'.$keyword.'%')
                ->orWhere('make LIKE ?', '%'.$keyword.'%')
                ->orWhere('model LIKE ?', '%'.$keyword.'%')
                ->orWhere('vin LIKE ?', '%'.$keyword.'%')
                ->orWhere('postcode LIKE ?', '%'.$keyword.'%');
        }

        return $query->execute();
    }

}