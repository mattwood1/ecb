<?php
class Coda_Model_JobCard extends Doctrine_Record
{

    public function setTableDefinition()
    {

        $this->setTableName('jobCard');

        $this->hasColumn('jobCardId', 'integer', 11, array(
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

        $this->hasColumn('mechanical', 'integer', 11, array(
                'type'                => 'integer',
                'length'              => '11'
        ));

        $this->hasColumn('panel', 'integer', 11, array(
                'type'                => 'integer',
                'length'              => '11'
        ));
        $this->hasColumn('strip', 'integer', 11, array(
                'type'                => 'integer',
                'length'              => '11'
        ));
         $this->hasColumn('prep', 'integer', 11, array(
                'type'                => 'integer',
                'length'              => '11'
        ));
          $this->hasColumn('polish', 'integer', 11, array(
                'type'                => 'integer',
                'length'              => '11'
        ));
        $this->hasColumn('fit', 'integer', 11, array(
                'type'                => 'integer',
                'length'              => '11'
        ));
         $this->hasColumn('paint', 'integer', 11, array(
                'type'                => 'integer',
                'length'              => '11'
        ));
         $this->hasColumn('clean', 'integer', 11, array(
                'type'                => 'integer',
                'length'              => '11'
        ));

         $this->hasColumn('dateBooked', 'timestamp', 25, array(
                'type'                => 'timestamp',
                'length'              => '25'
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