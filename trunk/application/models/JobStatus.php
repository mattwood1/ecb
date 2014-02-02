<?php
class Coda_Model_JobStatus extends Doctrine_Record
{

    public function setTableDefinition()
    {

        $this->setTableName('jobStatus');

        $this->hasColumn('jobStatusId', 'integer', 11, array(
                'type'                => 'integer',
                'fixed'               => 0,
                'unsigned'            => true,
                'primary'             => true,
                'autoincrement'       => true,
                'length'              => '11',
        ));

        $this->hasColumn('label', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('class', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));
    }

    public function setUp()
    {
/*
        $this->hasMany('Coda_Model_Job', array(
                'local' =>     'jobStatusId',
                'foreign' => 'jobStatusId'
        ));
*/
    }
}