<?php
class ECB_Model_JobProcessTable extends Doctrine_Record
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_JobProcess');
    }

}