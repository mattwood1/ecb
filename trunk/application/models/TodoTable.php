<?php
class ECB_Model_TodoTable extends Doctrine_Record
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_Todo');
    }

}