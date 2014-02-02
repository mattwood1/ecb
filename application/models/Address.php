<?php
class Coda_Model_Address extends Doctrine_Record
{

    public function setTableDefinition()
    {

        $this->setTableName('addressbook');

        $this->hasColumn('addressId', 'integer', 11, array(
                'type'                => 'integer',
                'fixed'               => 0,
                'unsigned'            => true,
                'primary'             => true,
                'autoincrement'       => true,
                'length'              => '11',
        ));

        $this->hasColumn('description', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('name', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('address', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('postcode', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));
        $this->hasColumn('homeTel', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));
        $this->hasColumn('mobileTel', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));
        $this->hasColumn('email', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

    }

    public function setUp()
    {
/*
        $this->hasMany('Coda_Model_Session as sessions', array(
                'local' =>     'addressId',
                'foreign' => 'addressId',
                'cascade' => array('delete')
        ));
*/

      /*  $this->hasOne('Coda_Model_Job', array(
                'local' =>     'jobId',
                'foreign' => 'jobId'
        ));
*/
    }
}