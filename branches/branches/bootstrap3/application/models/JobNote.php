<?php
class Coda_Model_JobNote extends Doctrine_Record
{

    public function setTableDefinition()
    {

        $this->setTableName('jobNote');

        $this->hasColumn('jobNoteId', 'integer', 11, array(
                'type'                => 'integer',
                'fixed'               => 0,
                'unsigned'            => true,
                'primary'             => true,
                'autoincrement'       => true,
                'length'              => '11',
        ));

        $this->hasColumn('jobId', 'integer', 11, array(
                'type'                => 'integer',
                'length'              => '11'
        ));

        $this->hasColumn('userId', 'integer', 11, array(
                'type'                => 'integer',
                'length'              => '11'
        ));

        $this->hasColumn('note', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('dateCreated', 'datetime', 25, array(
                'type'                => 'datetime',
                'length'              => '25'
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

        $this->hasOne('Coda_Model_User as user', array(
                'local' =>     'userId',
                'foreign' => 'userId'
        ));
    }
}