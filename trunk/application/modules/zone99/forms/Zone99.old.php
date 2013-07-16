<?php
class zone99_Form_Zone99 extends Twitter_Form
{
    public function init()
    {
        $this->setAttrib('horizontal', true);

        $this->addElement('file', 'image', array (
                'label'     => 'Image',
        ));
        $this->addElement('text', 'make', array (
                'label'     => 'Manufacturer'
        ));
        $this->addElement('textarea', 'description', array (
                'label'     => 'Description'
        ));
        $this->addElement('text', 'partNo', array (
                'label'     => 'Part Number'
        ));
        $this->addElement('text', 'price', array (
                'label'     => 'Price'
        ));
        
        $this->addElement("submit", "save", array("label" => "Save"));
        
    }
}