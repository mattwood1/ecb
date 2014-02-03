<?php
class ECB_Model_PurchaseTable extends Doctrine_Record
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_Purchase');
    }

}