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
        
        $this->addElement('text', 'invoiceNumber', array (
                'label'     => 'Invoice Number',
                'required'  => true,
        ));
        
        $this->addElement('text', 'cost', array (
                'label'     => 'Invoice Number',
                'required'  => true,
                'prepend' => '<i class="icon-gbp"></i>',
        ));
        
        $this->addElement('button', 'save', array(
                'type'          => 'submit',
                'buttonType'    => 'success',
                'label'         => 'Save'
        ));
    }
}