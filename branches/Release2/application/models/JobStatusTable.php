<?php
class ECB_Model_JobStatusTable extends Doctrine_Record
{
    const WIP = 4;
    const COMPLETE = 5;


    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_JobStatus');
    }

}