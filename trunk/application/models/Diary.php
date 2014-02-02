<?php
class Coda_Model_Diary extends Doctrine_Record
{

    public function setTableDefinition()
    {

        $this->setTableName('diary');

        $this->hasColumn('diaryId', 'integer', 11, array(
                'type'                => 'integer',
                'fixed'               => 0,
                'unsigned'            => true,
                'primary'             => true,
                'autoincrement'       => true,
                'length'              => '11',
        ));

        $this->hasColumn('subject', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('details', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('dateBegin', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('dateEnd', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));
        
        $this->hasColumn('time', 'string', 1000, array(
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