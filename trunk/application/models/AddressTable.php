<?php
class ECB_Model_AddressTable extends Doctrine_Record
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ECB_Model_Address');
    }

}