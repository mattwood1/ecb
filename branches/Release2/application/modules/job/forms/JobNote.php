<?php
class Job_Form_JobNote extends Twitter_Bootstrap_Form_Vertical
{
    protected $_jobId;

    public function setJob($job)
    {
        $this->_jobId = $job;
    }

    public function init()
    {
        $this->setAttrib('horizontal', true);

        $this->addElement('textarea', 'note', array (
                'label'    => 'Note',
                'rows'     => '5',
                'class'    => 'span12'
        ));

        $this->addElement('hidden', 'jobId', array (
                'value'     => $this->_jobId
        ));

        $this->addElement('button', 'save', array(
                'type'          => 'submit',
                'buttonType'    => 'success',
                'icon'          => 'ok',
                'label'         => 'Save',
                'iconPosition'  => 'right',
                'escape'        => false
        ));
    }
}