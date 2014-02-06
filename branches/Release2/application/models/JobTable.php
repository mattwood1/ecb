<?php
class ECB_Model_JobTable extends Doctrine_Record
{
    protected $_query;
    protected $_order;

    const ESTIMATE = 1;
    const TO_BOOK_IN = 2;
    const BOOKED_IN = 3;
    const WIP = 4;
    const COMPLETE = 5;

    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_Job');
    }

    public function getQuery()
    {
        return $this->_query;
    }

    public function getJobs()
    {
        $this->_query = $this->getInstance()->createQuery('j');
    }

    public function orderJobs($params)
    {
        $this->_query->orderBy($params);
    }

    public function searchJobs($keyword)
    {
        $this->_query
            ->where('carReg LIKE ?', '%'.$keyword.'%')
            ->orWhere('name LIKE ?', '%'.$keyword.'%')
            ->orWhere('make LIKE ?', '%'.$keyword.'%')
            ->orWhere('model LIKE ?', '%'.$keyword.'%')
            ->orWhere('vin LIKE ?', '%'.$keyword.'%')
            ->orWhere('postcode LIKE ?', '%'.$keyword.'%');
    }

    public function filterStatus($statusId)
    {
        $this->_query->where('jobStatusId = ?', $statusId);
    }

    public function filterProcess($processId)
    {
        $this->_query->where('jobProcessId = ?', $processId);
    }

}