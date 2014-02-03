<?php
class ECB_Model_JobCardTable extends Doctrine_Record
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_JobCard');
    }

}