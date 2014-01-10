<?php
class ECB_Model_JobStatusTable extends Doctrine_Record
{
    const READY_TO_INVOICE = 5;


    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_JobStatus');
    }

}