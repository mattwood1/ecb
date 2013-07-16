<?php
class Job_Form_JobPart extends Twitter_Form
{
    protected $_jobId;

    public function setJob($job)
    {
        $this->_jobId = $job;
    }

    public function init()
    {
        $this->setAttrib('horizontal', true);

        $this->addElement('text', 'quantity', array (
                'placeholder'     => 'Qty',
                'class'           => 'span12'
        ));
        $this->addElement('text', 'description', array (
                'placeholder'     => 'Description',
                'class'           => 'span12'
        ));
        $this->addElement('text', 'cost', array (
                'placeholder'     => 'Cost',
                'class'           => 'span12'
        ));
        $this->addElement('text', 'discount', array (
                'placeholder'     => 'Discount',
                'class'           => 'span12'
        ));
        $this->addElement('text', 'vat', array (
                'placeholder'     => 'VAT',
                'class'           => 'span12'
        ));
        $this->addElement('text', 'total', array (
                'placeholder'     => 'Total',
                'class'           => 'span12'
        ));
        $this->addElement('hidden', 'jobId', array (
                'value'           => $this->_jobId
        ));

        $this->addElement("submit", "save", array("label" => "Save"));
    }
}