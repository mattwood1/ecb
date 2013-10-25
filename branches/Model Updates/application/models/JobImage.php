<?php
class ECB_Model_JobImage extends Doctrine_Record
{

    public function setTableDefinition()
    {

        $this->setTableName('jobImage');

        $this->hasColumn('imageJobId', 'integer', 11, array(
                'type'                => 'integer',
                'fixed'               => 0,
                'unsigned'            => true,
                'primary'             => true,
                'autoincrement'       => true,
                'length'              => '11',
        ));

        $this->hasColumn('jobId', 'integer', 11, array(
                'type'                => 'integer',
                'length'              => '11',
        ));

        $this->hasColumn('file', 'text', 1000, array(
                'type'                => 'text',
                'length'              => '1000'
        ));

        $this->hasColumn('thumb', 'text', 1000, array(
                'type'                => 'text',
                'length'              => '1000'
        ));

        $this->hasColumn('dateCreated', 'datetime', 1000, array(
                'type'                => 'datetime',
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