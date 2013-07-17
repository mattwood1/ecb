<?php
class Job_Form_Job extends Twitter_Form
{
    public function init()
    {
        $this->setAttrib('vertical', true);

        $this->addElement('text', 'insDate', array (
                'label'     => 'Inspection Date',
                'required'  => true,
                'class' => 'span12 datepicker'
        ));

        $this->addElement('text', 'carReg', array(
                'label'      => 'Car Reg',
                'required'  => true,
        ));

        $this->addElement('text', 'name', array(
                'label' => 'Name',
                'class' => 'span12'
        ));

        $this->addElement('textarea', 'address', array(
                'label' => 'Address',
                'class' => 'span12'
        ));

        $this->addElement('text', 'postcode', array(
                'label' => 'Postcode',
                'class' => 'span12'
        ));

        $this->addElement('text', 'tel', array(
                'label' => 'Telephone',
                'class' => 'span12'
        ));

        $this->addElement('text', 'mobile', array(
                'label' => 'Mobile',
                'class' => 'span12'
        ));

        $this->addElement('text', 'email', array(
                'label' => 'Email',
                'class' => 'span12'
        ));

        $this->addElement('text', 'insName', array (
                'label' => 'Insurance Company Name',
                'class' => 'span12'
        ));

        $this->addElement('textarea', 'insAdd', array(
                'label' => 'Insurance Address',
                'class' => 'span12'
        ));

        $this->addElement('text', 'insPost', array(
                'label' => 'Insurance Postcode',
                'class' => 'span12'
        ));

        $this->addElement('text', 'insTel', array(
                'label' => 'Insurance Tel',
                'class' => 'span12'
        ));

        $this->addElement('text', 'excess', array(
                'label' => 'Excess Amount',
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
                'label' => 'Status',
                 'multiOptions' => array(
                        '1'      => 'Estimate',
                        '2'      => 'To Book In',
                        '3'      => 'Booked In',
                        '4'      => 'W I P',
                        '5'      => 'Ready To Invoice',
                        '6'      => 'Invoiced Out',
                        '7'      => 'Archived',),
                'class' => 'span12'
        ));

        $this->addElement('select', 'jobProcessId', array(
                'label' => 'Stage of Process',
                'multiOptions' => array (
                        '1'      => 'Strip',
                        '2'      => 'Fit',
                        '3'      => 'Paint',
                        '4'      => 'Repair',
                        '5'      => 'Prime',
                        '6'      => 'Polish / Wash',
                        '7'      => 'Complete',),

                'class' => 'span12'
        ));

        $this->addElement('checkbox', 'seToyota', array(
                'label' => 'SE Toyota Vehicle',
        ));

        $this->addElement('textarea', 'damage', array(
                'label' => 'Damage Appraisal',
                'class' => 'span12'
        ));

        $this->addElement('textarea', 'special', array(
                'label' => 'Specialist Works Required',
                'class' => 'span12'
        ));

        $this->addElement('textarea', 'partsEst', array(
                'label' => 'Parts Required',
                'class' => 'span12'
        ));

        $this->addElement('text', 'estPrep', array(
                'label' => 'Estimate Prepared by:',
                'class' => 'span12'
        ));

        $this->addElement('text', 'labRate', array(
                'label' => 'Labour Rate (number)',
                'class' => 'span12'
        ));

        $this->addElement('text', 'labHours', array(
                'label' => 'Total Labour Hours (number)',
                'class' => 'span12'
        ));

        $this->addElement('text', 'labEst', array(
                'label' => 'Total Labour',
                'class' => 'span12',
                'readonly' => 'readonly'
        ));

        $this->addElement('text', 'pandmEst', array(
                'label' => 'Paint & Materials (estimate)',
                'class' => 'span12'
        ));

        $this->addElement('text', 'partsTotal', array(
                'label' => 'Total Parts £ (estimate)',
                'class' => 'span12'
        ));

        $this->addElement('text', 'specialEst', array(
                'label' => 'Specialist Charges £',
                'class' => 'span12'
        ));

        $this->addElement('text', 'recovEst', array(
                'label' => 'Recovery Charge',
                'class' => 'span12'
        ));

        $this->addElement('text', 'subtotEst', array(
                'label' => 'Sub-Total Estimate',
                'class' => 'span12',
                'readonly' => 'readonly'
        ));

        $this->addElement('text', 'vatEst', array(
                'label' => 'VAT Total',
                'class' => 'span12',
                'readonly' => 'readonly'
        ));

        $this->addElement('text', 'totalEst', array(
                'label' => 'Total Estimate',
                'class' => 'span12',
                'readonly' => 'readonly'
        ));


        $this->addElement("submit", "save", array("label" => "Save"));
    }
}