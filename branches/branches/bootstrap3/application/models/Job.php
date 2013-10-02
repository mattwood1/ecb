<?php
class Coda_Model_Job extends Doctrine_Record
{

    public function setTableDefinition()
    {

        $this->setTableName('job');

        $this->hasColumn('jobId', 'integer', 11, array(
                'type'                => 'integer',
                'fixed'               => 0,
                'unsigned'            => true,
                'primary'             => true,
                'autoincrement'       => true,
                'length'              => '11',
        ));

        $this->hasColumn('carReg', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000',
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

        $this->hasColumn('tel', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('mobile', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('email', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('make', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('model', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('mileage', 'integer', 11, array(
                'type'                => 'integer',
                'length'              => '11'
        ));

        $this->hasColumn('vin', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('transmission', 'enum', null, array(
                'type'                => 'enum',
                'values'              => array('Auto', 'Manual', 'Unknown')
        ));

        $this->hasColumn('fuel', 'enum', null, array(
                'type'                => 'enum',
                'values'              => array('Petrol', 'Diesel', 'LPG', 'Hybrid', 'Unknown', 'Electric')
        ));

        $this->hasColumn('colour', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('damage', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('special', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('partsEst', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('excess', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));

        $this->hasColumn('vatRegistered', 'integer', 4, array(
                'type'                => 'integer',
                'length'              => '4'
        ));

        $this->hasColumn('seToyota', 'integer', 4, array(
                'type'                => 'integer',
                'length'              => '4'
        ));

        $this->hasColumn('jobStatusId', 'integer', 2, array(
                'type'                => 'integer',
                'length'              => '2'
        ));

        $this->hasColumn('jobProcessId', 'integer', 2, array(
                'type'                => 'integer',
                'length'              => '2'
        ));

        // Insurance
        $this->hasColumn('insDate', 'date', null, array(
                'type'                => 'date'
        ));

        $this->hasColumn('insName', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('insAdd', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('insPost', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('insTel', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));


        // Calculations
        $this->hasColumn('labRate', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));

        $this->hasColumn('labHours', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));

        $this->hasColumn('labEst', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));

        $this->hasColumn('pandmEst', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));

        $this->hasColumn('partsTotal', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));

        $this->hasColumn('specialEst', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));

        $this->hasColumn('vatEst', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));

        $this->hasColumn('subtotEst', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));

        $this->hasColumn('totalEst', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));

        $this->hasColumn('recovEst', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));

        $this->hasColumn('estPrep', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        // Default Columns
        $this->hasColumn('dateCreated', 'datetime', 25, array(
                'type'                => 'datetime',
                'length'              => '25'
        ));

        $this->hasColumn('dateModified', 'timestamp', 25, array(
                'type'                => 'timestamp',
                'length'              => '25'
        ));
    }

    public function setUp()
    {

        $this->hasMany('Coda_Model_JobPart as parts', array(
                'local'   => 'jobId',
                'foreign' => 'jobId',
                'cascade' => array('delete')
        ));

        $this->hasMany('Coda_Model_JobNote as notes', array(
                'local'   => 'jobId',
                'foreign' => 'jobId',
                'cascade' => array('delete')
        ));

        $this->hasOne('Coda_Model_JobCard as card', array(
                'local'   =>     'jobId',
                'foreign' =>     'jobId',
                'cascade' =>      array('delete')
        ));

        $this->hasOne('Coda_Model_JobStatus as status', array(
                'local'   =>     'jobStatusId',
                'foreign' =>     'jobStatusId'
        ));

        $this->hasOne('Coda_Model_JobProcess as process', array(
                'local' =>     'jobProcessId',
                'foreign' => 'jobProcessId'
        ));

    }
}
