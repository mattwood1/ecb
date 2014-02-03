<?php
class ECB_Model_Purchase extends Doctrine_Record
{

    public function setTableDefinition()
    {

        $this->setTableName('purchase');

        $this->hasColumn('id', 'integer', 11, array(
                'type'                => 'integer',
                'fixed'               => 0,
                'unsigned'            => true,
                'primary'             => true,
                'autoincrement'       => true,
                'length'              => '11',
        ));

        $this->hasColumn('purchaseDate', 'date', null, array(
                'type'                => 'date'
        ));

        $this->hasColumn('company', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('invoiceNumber', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('referenceNumber', 'string', 1000, array(
                'type'                => 'string',
                'length'              => '1000'
        ));

        $this->hasColumn('amount', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));

        $this->hasColumn('vat', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));

        $this->hasColumn('total', 'decimal', 12, array(
                'type'                => 'decimal',
                'length'              => '10',
                'scale'               => '2'
        ));

        $this->hasColumn('dueDate', 'date', null, array(
                'type'                => 'date'
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
}