<?php
class ECB_Model_JobProcess extends Doctrine_Record
{
    const STRIP = 1;
    const POLISH_FIT = 2;
    const PAINT = 3;
    const REPAIR = 4;
    const PRIME = 5;
    const WASH = 6;
    const COMPLETE = 7;

    public function setTableDefinition()
    {

        $this->setTableName('jobProcess');

        $this->hasColumn('jobProcessId', 'integer', 11, array(
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
    }

    public function setUp()
    {

        $this->hasMany('ECB_Model_Job', array(
                'local' =>     'jobProcessId',
                'foreign' => 'jobProcessId'
        ));

    }
}