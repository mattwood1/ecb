<?php
class ECB_Model_Ccars extends Doctrine_Record
{

    public function setTableDefinition()
    {

        $this->setTableName('ccars');

        $this->hasColumn('carId', 'integer', 11, array(
                'type'                => 'integer',
                'fixed'               => 0,
                'unsigned'            => true,
                'primary'             => true,
                'autoincrement'       => true,
                'length'              => '11',
        ));

        $this->hasColumn('reg', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('motDue', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('taxDue', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('service', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));
        $this->hasColumn('bookedOut', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));
        
        $this->hasColumn('dueIn', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));
        
        $this->hasColumn('description', 'string', 1000, array (
                'type'                 => 'string',
                'length'               => '1000'
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