<?php
class Job_Form_JobCard extends Twitter_Bootstrap_Form_Vertical
{
     protected $_jobId;

    public function setJob($job)
    {
        $this->_jobId = $job;
    }
    public function init()
    {
        $this->setAttrib('horizontal', true)

        ->addElement('text', 'mechanical', array (
                'placeholder'     => 'Mechanical',
                'label'     => 'Mechanical',
                'class'     => 'span12'
        ))

        ->addElement('text', 'panel', array (
                'placeholder'     => 'Panel',
                'label'     => 'Panel',
                'class'     => 'span12'
        ))

        ->addElement('text', 'strip', array (
                'placeholder'     => 'Strip',
                'label'     => 'Strip',
                'class'     => 'span12'
        ))

        ->addElement('text', 'prep', array (
                'placeholder'     => 'Prep',
                'Label'     => 'Prep',
                'class'     => 'span12'
        ))

        ->addElement('text', 'polish', array (
                'placeholder'     => 'Polish',
                'label'     => 'Polish',
                'class'     => 'span12'
        ))

        ->addElement('text', 'fit', array (
                'placeholder'     => 'Fit',
                'label'     => 'Fit',
                'class'     => 'span12'
        ))

        ->addElement('text', 'paint', array(
                'placeholder'     => 'Paint',
                'label'     => 'Paint',
                'class'     => 'span12'
        ))

        ->addElement('text', 'clean', array(
                'placeholder'     => 'Clean',
                'label'     => 'Clean',
                'class'     => 'span12'
        ))

        ->addElement('text', 'dateBooked', array(
                'placeholder'     => 'Date Booked in:',
                'label'     => 'Date Booked in:',
                'class'     => 'span12 datepicker'
        ))

        ->addElement('hidden', 'jobId', array (
                'value'           => $this->_jobId
        ))

        ->addElement('button', 'save', array(
                 'type'          => 'submit',
                 'buttonType'    => 'success',
                 'icon'          => 'ok',
                 'label'         => 'Save',
                 'iconPosition'  => 'right',
                 'escape'        => false
         ));
    }
}