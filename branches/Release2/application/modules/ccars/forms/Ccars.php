<?php
class ccars_Form_Ccars extends Twitter_Bootstrap_Form_Vertical
{
    public function init()
    {
        $this->setAttrib('horizontal', true);

        $this->addElement('text', 'reg', array (
                'label'     => 'Registration',
        ));

        $this->addElement('text', 'description', array (
                'label'     => 'Make - Model - Fuel - Sepc',
        ));
        $this->addElement('text', 'motDue', array (
                'label'     => 'MOT due'
        ));
        $this->addElement('textarea', 'taxDue', array (
                'label'     => 'Tax Due'
        ));
        $this->addElement('text', 'service', array (
                'label'     => 'Service Due'
        ));
        $this->addElement('text', 'dateBooked', array (
                'label'     => 'Date Out'
        ));
        $this->addElement('text', 'dueIn', array (
                'label'     => 'Date Back'
        ));

        $this->addElement("submit", "save", array("label" => "Save"));

    }
}