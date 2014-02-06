<?php
class Job_Form_Job extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        $jobStatuses = new ECB_Model_JobStatusTable();
        $jobProcesses = new ECB_Model_JobProcessTable();

        $this->addElement('text', 'insDate', array (
                'label'     => 'Inspection Date',
                'required'  => true,
                'prepend' => '<i class="icon-calendar"></i>',
                'class' => 'span12 datepicker'
        ));

        $this->addElement('text', 'carReg', array(
                'label'     => 'Car Reg',
                'class'     => 'span12',
                'required'  => true,
        ));

        $this->addElement('text', 'name', array(
                'label' => 'Name',
                'class' => 'span12'
        ));

        $this->addElement('textarea', 'address', array(
                'label' => 'Address',
                'class' => 'span12',
                'rows'  => '3'
        ));

        $this->addElement('text', 'postcode', array(
                'label' => 'Postcode',
                'prepend' => '<i class="icon-map-marker"></i>',
                'class' => 'span12'
        ));

        $this->addElement('text', 'tel', array(
                'label' => 'Telephone',
                'class' => 'span12',
                'prepend' => '<i class="icon-phone"></i>'
        ));

        $this->addElement('text', 'mobile', array(
                'label' => 'Mobile',
                'prepend' => '<i class="icon-mobile-phone"></i>',
                'class' => 'span12'
        ));

        $this->addElement('text', 'email', array(
                'label' => 'Email',
                'prepend' => '<i class="icon-envelope"></i>',
                'class' => 'span12'
        ));

        $this->addElement('text', 'insName', array (
                'label' => 'Insurance Company Name',
                'class' => 'span12'
        ));

        $this->addElement('textarea', 'insAdd', array(
                'label' => 'Insurance Address',
                'class' => 'span12',
                'rows'  => '3'
        ));

        $this->addElement('text', 'insPost', array(
                'label' => 'Insurance Postcode',
                'prepend' => '<i class="icon-map-marker"></i>',
                'class' => 'span12'
        ));

        $this->addElement('text', 'insTel', array(
                'label' => 'Insurance Tel',
                'prepend' => '<i class="icon-phone"></i>',
                'class' => 'span12'
        ));

        $this->addElement('text', 'excess', array(
                'label' => 'Excess Amount',
                'prepend' => '<i class="icon-gbp"></i>',
                'class' => 'span12'
        ));

        $this->addElement('select', 'vatRegistered', array(
                'label' => 'Vat Registered?',
                'multiOptions' => array(
                        '0'       => 'Unknown',
                        '1'      => 'Yes',
                        '0'      => 'No',
                    ),
                'class' => 'span12'
        ));

        $this->addElement('text', 'make', array(
                'label' => 'Make',
                'class' => 'span12'
        ));

        $this->addElement('text', 'model', array(
                'label' => 'Model',
                'class' => 'span12'
        ));

        $this->addElement('text', 'mileage', array(
                'label' => 'Mileage',
                'class' => 'span12'
        ));

        $this->addElement('text', 'vin', array(
                'label' => 'Vin / Chassis No.',
                'class' => 'span12'
        ));

        $this->addElement('text', 'colour', array(
                'label' => 'Colour',
                'class' => 'span12'
        ));


        $this->addElement('select', 'transmission', array(
                'label' => 'Transmission',
                'multiOptions' => array(
                        ''         => 'Please Choose',
                        'Auto'     => 'Auto',
                        'Manual'   => 'Manual',
                        'Unknown'  => 'Unknown'
                     ),
                'class' => 'span12'
        ));

        $this->addElement('select', 'fuel', array(
                'label' => 'Fuel Type',
                'multiOptions' => array(
                        ''         => 'Please Choose',
                        'Petrol'   => 'Petrol',
                        'Diesel'   => 'Diesel',
                        'LPG'      => 'LPG',
                        'Hybrid'   => 'Hybrid',
                        'Electric' => 'Electric',
                        'Unknown'  => 'Unknown',
                     ),
                'class' => 'span12'
        ));

        $this->addElement('select', 'jobStatusId', array(
                'label'        => 'Status',
                'multiOptions' => $jobStatuses->getPairs(),
                'class'        => 'span12'
        ));

        $this->addElement('select', 'jobProcessId', array(
                'label' => 'Stage of Process',
                'multiOptions' => $jobProcesses->getPairs(),
                'class' => 'span12'
        ));

        $this->addElement('checkbox', 'seToyota', array(
                'label' => 'SE Toyota Vehicle',
        ));

        $this->addElement('textarea', 'damage', array(
                'label' => 'Damage Appraisal',
                'class' => 'span12',
                'rows'  => '3'
        ));

        $this->addElement('textarea', 'special', array(
                'label' => 'Specialist Works Required',
                'class' => 'span12',
                'rows'  => '3'
        ));

        $this->addElement('textarea', 'partsEst', array(
                'label' => 'Parts Required',
                'class' => 'span12',
                'rows'  => '3'
        ));

        $this->addElement('text', 'estPrep', array(
                'label' => 'Prepared by:',
                'prepend' => '<i class="icon-user"></i>',
                'class' => 'span12'
        ));

        $this->addElement('text', 'labRate', array(
                'label' => 'Labour Rate',
                'prepend' => '<i class="icon-gbp"></i>',
                'class' => 'span12'
        ));

        $this->addElement('text', 'labHours', array(
                'label' => 'Total Labour Hours',
                'prepend' => '<i class="icon-time"></i>',
                'class' => 'span12'
        ));

        $this->addElement('text', 'labEst', array(
                'label' => 'Total Labour',
                'class' => 'span12',
                'readonly' => 'readonly',
                'prepend' => '<i class="icon-gbp"></i>'
        ));

        $this->addElement('text', 'pandmEst', array(
                'label' => 'Paint & Materials',
                'prepend' => '<i class="icon-gbp"></i>',
                'class' => 'span12'
        ));

        $this->addElement('text', 'partsTotal', array(
                'label' => 'Total Parts',
                'prepend' => '<i class="icon-gbp"></i>',
                'class' => 'span12'
        ));

        $this->addElement('text', 'specialEst', array(
                'label' => 'Specialist Charges',
                'prepend' => '<i class="icon-gbp"></i>',
                'class' => 'span12'
        ));

        $this->addElement('text', 'recovEst', array(
                'label' => 'Recovery Charge',
                'prepend' => '<i class="icon-gbp"></i>',
                'class' => 'span12'
        ));

        $this->addElement('text', 'subtotEst', array(
                'label' => 'Sub-Total Estimate',
                'class' => 'span12',
                'prepend' => '<i class="icon-gbp"></i>',
                'readonly' => 'readonly'
        ));

        $this->addElement('text', 'vatEst', array(
                'label' => 'VAT Total',
                'class' => 'span12',
                'prepend' => '<i class="icon-gbp"></i>',
                'readonly' => 'readonly'
        ));

        $this->addElement('text', 'totalEst', array(
                'label' => 'Total Estimate',
                'class' => 'span12',
                'prepend' => '<i class="icon-gbp"></i>',
                'readonly' => 'readonly'
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