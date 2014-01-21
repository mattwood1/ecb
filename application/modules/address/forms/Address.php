<?php
class Address_Form_Address extends Twitter_Bootstrap_Form_Vertical
{
    public function init()
    {
        $this->setAttrib('horizontal', true);

        $this->addElement('text', 'description', array (
                'label'     => 'Description',
        ));
        $this->addElement('text', 'name', array (
                'label'     => 'Name'
        ));
        $this->addElement('textarea', 'address', array (
                'label'     => 'Address'
        ));
        $this->addElement('text', 'postcode', array (
                'label'     => 'Postcode'
        ));
        $this->addElement('text', 'homeTel', array (
                'label'     => 'Home No.'
        ));
        $this->addElement('text', 'mobileTel', array (
                'label'     => 'Mobile No.'
        ));
        $this->addElement('text', 'email', array(
                'label'     => 'E-mail Address'
        ));

        $this->addElement("submit", "save", array("label" => "Save"));
    }
}