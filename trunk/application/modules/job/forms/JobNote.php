<?php
class Job_Form_JobNote extends Twitter_Form
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
                'label'     => 'Note',
        ));

        $this->addElement('hidden', 'jobId', array (
                'value'     => $this->_jobId
        ));

        $this->addElement("submit", "save", array("label" => "Save"));
    }
}