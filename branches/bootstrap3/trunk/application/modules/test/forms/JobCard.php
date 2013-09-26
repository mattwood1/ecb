<?php
class Job_Form_JobCard extends Twitter_Form
{
     protected $_jobId;

    public function setJob($job)
    {
        $this->_jobId = $job;
    }
    public function init()
    {
        $this->setAttrib('horizontal', true);

        $this->addElement('text', 'mechanical', array (
                'placeholder'     => 'Mechanical',
        ));
        $this->addElement('text', 'panel', array (
                'placeholder'     => 'Panel'
        ));
        $this->addElement('text', 'strip', array (
                'placeholder'     => 'Strip'
        ));
        $this->addElement('text', 'prep', array (
                'placeholder'     => 'Prep'
        ));
        $this->addElement('text', 'polish', array (
                'placeholder'     => 'Polish'
        ));
        $this->addElement('text', 'fit', array (
                'placeholder'     => 'Fit'
        ));
        $this->addElement('text', 'paint', array(
                'placeholder'     => 'Paint'
        ));
        $this->addElement('text', 'clean', array(
                'placeholder'     => 'Clean'
        ));
        $this->addElement('text', 'dateBooked', array(
                'placeholder'     => 'Date Booked in:',
                'class' => 'span12 datepicker'
        ));
         $this->addElement('hidden', 'jobId', array (
                'value'           => $this->_jobId
        ));

        $this->addElement("submit", "save", array("label" => "Save"));
    }
}