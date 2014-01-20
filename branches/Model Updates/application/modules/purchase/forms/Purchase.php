<?php
class Purchase_Form_Purchase extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        $this->addElement('text', 'purchaseDate', array (
                'label'     => 'Purchase Date',
                'required'  => true,
                'prepend' => '<i class="icon-calendar"></i>',
                'class' => 'datepicker'
        ));
        
        $this->addElement('text', 'company', array(
                'label' => 'Company',
                'required' => true
        ));
        
        $this->addElement('text', 'invoiceNumber', array (
                'label'     => 'Invoice Number',
                'required'  => true
        ));
        
        $this->addElement('text', 'referenceNumber', array (
                'label'     => 'Reference Number',
        ));
        
        $this->addElement('text', 'amount', array (
                'label'     => 'Amount',
                'required'  => true,
                'prepend' => '<i class="icon-gbp"></i>',
        ));
        
        $this->addElement('text', 'vat', array (
                'label'     => 'VAT',
                'required'  => true,
                'prepend' => '<i class="icon-gbp"></i>',
        ));
        
        $this->addElement('text', 'total', array (
                'label'     => 'Total',
                'required'  => true,
                'prepend' => '<i class="icon-gbp"></i>',
        ));
        
        $this->addElement('text', 'dueDate', array (
                'label'     => 'Due Date',
                'required'  => true,
                'prepend' => '<i class="icon-calendar"></i>',
                'class' => 'datepicker'
        ));
        
        $this->addElement('button', 'save', array(
                'type'          => 'submit',
                'buttonType'    => 'success',
                'label'         => 'Save'
        ));
    }
}