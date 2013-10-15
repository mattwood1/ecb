<?php
class Job_Form_Job extends Twitter_Bootstrap_Form_Vertical
{
    public function init()
    {
        $this->setAttrib('horizontal', true);

        $this->addElement('text', 'insDate', array (
                'label'     => 'Inspection Date',
                'required'  => true
        ));

        $this->addElement('text', 'carReg', array(
                'label'     => 'Car Reg',
                'required'  => true
        ));

        $this->addElement('text', 'name', array(
                'label' => 'Name'
        ));

        $this->addElement('textarea', 'address', array(
                'label' => 'Address',
        ));

        $this->addElement('text', 'postcode', array(
                'label' => 'Postcode'
        ));

        $this->addElement('text', 'tel', array(
                'label' => 'Telephone'
        ));

        $this->addElement('text', 'mobile', array(
                'label' => 'Mobile'
        ));

        $this->addElement('text', 'email', array(
                'label' => 'Email'
        ));

        $this->addElement('text', 'insName', array (
                'label' => 'Insurance Company Name'
        ));

        $this->addElement('text', 'insAdd', array(
                'label' => 'Insurance Address'
        ));

        $this->addElement('text', 'insPost', array(
                'label' => 'Insurance Postcode'
        ));

        $this->addElement('text', 'insTel', array(
                'label' => 'Insurance Tel'
        ));

        $this->addElement('text', 'excess', array(
                'label' => 'Excess Amount'
        ));

        $this->addElement('select', 'vatRegistered', array(
                'label' => 'Vat Registered?',
                'multiOptions' => array(
                        ''       => 'Please Choose',
                        '1'      => 'Yes',
                        '0'      => 'No',
                    ),
                    'required' => true
        ));

        $this->addElement('text', 'make', array(
                'label' => 'Make'
        ));

        $this->addElement('text', 'model', array(
                'label' => 'Model'
        ));

        $this->addElement('text', 'mileage', array(
                'label' => 'Mileage'
        ));

        $this->addElement('text', 'vin', array(
                'label' => 'Vin / Chassis No.'
        ));

        $this->addElement('text', 'colour', array(
                'label' => 'Colour'
        ));


        $this->addElement('select', 'transmission', array(
                'label' => 'Transmission',
                'multiOptions' => array(
                        ''         => 'Please Choose',
                        'Auto'     => 'Auto',
                        'Manual'   => 'Manual',
                        'Unknown'  => 'Unknown'
                     ),
                'required' => true
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
                'required' => true
        ));

        $this->addElement('text', 'statusId', array(
                'label' => 'Status (needs to be added to table)'
        ));

        $this->addElement('text', 'processId', array(
                'label' => 'Stage of Process (needs adding to table)'
        ));

        $this->addElement('text', 'seToytoa', array(
                'label' => 'S E Toyota Vehicle (needs to be checkbox)'
        ));

        $this->addElement('textarea', 'damage', array(
                'label' => 'Damage Appraisal'
        ));

        $this->addElement('textarea', 'special', array(
                'label' => 'Specialist Works Required'
        ));

        $this->addElement('textarea', 'partsEst', array(
                'label' => 'Parts Required'
        ));

        $this->addElement('text', 'estPrep', array(
                'label' => 'Estimate Prepared by:'
        ));

        $this->addElement('text', 'labRate', array(
                'label' => 'Labour Rate (calculation + number)'
        ));

        $this->addElement('text', 'labHours', array(
                'label' => 'Total Labour Hours'
        ));

        $this->addElement('text', 'labEstimate', array(
                'label' => 'Total Labour £ (calculated[labrate] * [labhours]'
        ));

        $this->addElement('text', 'pandmEst', array(
                'label' => 'Paint & Materials (estimate)'
        ));

        $this->addElement('text', 'partsTotal', array(
                'label' => 'Total Parts £ (estimate)'
        ));

        $this->addElement('text', 'specialEst', array(
                'label' => 'Specialist Charges £'
        ));

        $this->addElement('text', 'recovEst', array(
                'label' => 'Recovery Charge'
        ));

        $this->addElement('text', 'subtotEst', array(
                'label' => 'Sub-Total Estimate'
        ));

        $this->addElement('text', 'vatEst', array(
                'label' => 'VAT Total'
        ));

        $this->addElement('text', 'totalEst', array(
                'label' => 'Total Estimate'
        ));


        $this->addElement("submit", "save", array("label" => "Save"));
    }
}