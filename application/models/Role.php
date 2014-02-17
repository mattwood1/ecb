<?php
class ECB_Model_Role extends Doctrine_Record
{

    public function setTableDefinition()
    {

        $this->setTableName('role');

        $this->hasColumn('roleId', 'integer', 11, array(
                'type'                => 'integer',
                'fixed'               => 0,
                'unsigned'            => true,
                'primary'             => true,
                'autoincrement'       => true,
                'length'              => '11',
        ));

        $this->hasColumn('name', 'string', 255, array(
                 'type'          => 'string',
                 'length'        => '255'
        ));

        $this->hasColumn('system', 'integer', 1, array(
                 'type'          => 'integer',
                 'length'        => '1'
        ));

        $this->hasColumn('resources', 'text', 10000, array(
                'type'          => 'text',
                'length'        => '10000'
        ));

        $this->hasColumn('deleted', 'integer', 1, array(
                'type'          => 'integer',
                'length'        => '1'
        ));

    }

    public function setUp()
    {
        $this->hasMany('ECB_Model_User as users', array(
           'local'      => 'roleId',
           'foreign'    => 'userId',
           'refClass'   => 'ECB_Model_UserRole'
        ));
    }
}