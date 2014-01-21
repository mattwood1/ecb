<?php
class ECB_Model_User extends Doctrine_Record
{

    public function setTableDefinition()
    {

        $this->setTableName('user');

        $this->hasColumn('userId', 'integer', 11, array(
                'type'                => 'integer',
                'fixed'               => 0,
                'unsigned'            => true,
                'primary'             => true,
                'autoincrement'       => true,
                'length'              => '11',
        ));

        $this->hasColumn('username', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('password', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('name', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('email', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));
        $this->hasColumn('dateCreated', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));
        $this->hasColumn('dateModified', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));
        $this->hasColumn('dateLoggedIn', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));
    }

    public static function isLoggedin()
    {
        return Zend_Auth::getInstance()->hasIdentity();
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