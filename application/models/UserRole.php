<?php
class ECB_Model_UserRole extends Doctrine_Record
{

    public function setTableDefinition()
    {

        $this->setTableName('userRole');

        $this->hasColumn('userId', 'integer', 4, array(
            'type'          => 'integer',
            'unsigned'      => true,
            'primary'       => true,
            'length'        => 4
        ));

        $this->hasColumn('roleId', 'integer', 4, array(
            'type'          => 'integer',
            'unsigned'      => true,
            'primary'       => true,
            'length'        => 4
        ));

    }

    public function setUp()
    {
        $this->hasOne('ECB_Model_User as user', array(
            'local'     => 'userId',
            'foreign'   => 'userId'
        ));

        $this->hasOne('ECB_Model_Role as role', array(
            'local'     => 'roleId',
            'foreign'   => 'roleId'
        ));
    }
}