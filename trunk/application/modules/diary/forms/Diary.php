<?php
class diary_Form_Diary extends Twitter_Form
{
    public function init()
    {
        $this->setAttrib('horizontal', true);

        $this->addElement('text', 'subject', array (
                'label'     => 'Subject',
                'class'     => 'span12'
        ));

        $this->addElement('textarea', 'details', array (
                'label'     => 'Details',
                'class'     => 'span12'
        ));

        $this->addElement('text', 'time', array(
                'label'     => 'Time',
                'class'     => 'span12'
        ));

        $this->addElement('text', 'dateBegin', array (
                'label'     => 'From',
                'class'     => 'datepicker span12'
        ));
        $this->addElement('text', 'dateEnd', array (
                'label'     => 'Until',
                'class'     => 'datepicker span12'
        ));

        $this->addElement('hidden', 'diaryId', array (
                'value'           => $this->_diaryId
        ));

        $this->addElement("submit", "save", array("label" => "Save"));

    }
}