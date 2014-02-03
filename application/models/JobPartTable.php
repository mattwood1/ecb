<?php
class ECB_Model_JobPartTable extends Doctrine_Record
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_JobPart');
    }

}