<?php
class ECB_Model_Todo extends Doctrine_Record
{

    public function setTableDefinition()
    {

        $this->setTableName('todo');

        $this->hasColumn('todoId', 'integer', 11, array(
                'type'                => 'integer',
                'fixed'               => 0,
                'unsigned'            => true,
                'primary'             => true,
                'autoincrement'       => true,
                'length'              => '11',
        ));

        $this->hasColumn('status', 'enum', null, array(
                'type'                => 'enum',
                'values'              => array("TODO", "DONE", "INFO", "FAULT")
        ));

        $this->hasColumn('note', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('userId', 'integer', 11, array(
                'type'                => 'integer',
                'length'              => '11'
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
        $this->hasOne('ECB_Model_User as user', array(
                'local'     => 'userId',
                'foreign'   => 'userId'
        ));
    }
}