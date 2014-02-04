<?php
class Todo_Form_Todo extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        $this->setAttrib('horizontal', true);

        $this->addElement('select', 'status', array(
                'label'    => 'Status',
                'multiOptions' => array(
                        "TODO" => "To Do",
                        "DONE" => "Done",
                        "INFO" => "Info",
                        "FAULT" => 'Fault'
                )
        ));

        $this->addElement('textarea', 'note', array (
                'label'     => 'Note',
                'class'     => 'span8',
                'rows'      => 6
        ));



        $this->addElement("submit", "save", array("label" => "Save"));
    }
}