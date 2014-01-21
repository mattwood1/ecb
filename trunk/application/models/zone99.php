<?php
class ECB_Model_Zone99 extends Doctrine_Record
{

    public function setTableDefinition()
    {

        $this->setTableName('zone99');

        $this->hasColumn('z99Id', 'integer', 11, array(
                'type'                => 'integer',
                'fixed'               => 0,
                'unsigned'            => true,
                'primary'             => true,
                'autoincrement'       => true,
                'length'              => '11',
        ));

        $this->hasColumn('image', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('make', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('description', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('partNo', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));
        $this->hasColumn('price', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

    }

    public function setUp()
    {
/*
        $this->hasMany('ECB_Model_Session as sessions', array(
                'local' =>     'addressId',
                'foreign' => 'addressId',
                'cascade' => array('delete')
        ));
*/

      /*  $this->hasOne('ECB_Model_Job', array(
                'local' =>     'jobId',
                'foreign' => 'jobId'
        ));
*/
    }
}