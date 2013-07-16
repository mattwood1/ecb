<?php
class Coda_Model_JobPart extends Doctrine_Record
{

    public function setTableDefinition()
    {

        $this->setTableName('jobPart');

        $this->hasColumn('jobPartId', 'integer', 11, array(
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

        $this->hasColumn('quantity', 'integer', 11, array(
                'type'                => 'integer',
                'length'              => '11'
        ));

        $this->hasColumn('description', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('cost', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));

        $this->hasColumn('discount', 'integer', 11, array(
                'type'                => 'integer',
                'length'              => '11'
        ));

        $this->hasColumn('vat', 'decimal', 5, array(
                'type'                => 'decimal',
                'length'              => '4',
                'scale'               => '1'
        ));

        $this->hasColumn('total', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));



        // Default Columns
        $this->hasColumn('dateCreated', 'timestamp', 25, array(
                'type'                => 'timestamp',
                'length'              => '25'
        ));

        $this->hasColumn('dateModified', 'timestamp', 25, array(
                'type'                => 'timestamp',
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
        $this->hasOne('Coda_Model_Job', array(
                'local' =>     'jobId',
                'foreign' => 'jobId'
        ));

    }
}