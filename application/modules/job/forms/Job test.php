<?php
class Job_Form_Job extends Twitter_Form
{
    public function init()
          {  
            <div class="row-fluid">
                <div class="well">
                    <div class="span6">

                        <h4>Customer Info</h4>

                                <div class="control-group">
                                    <label class="control-label" for="carReg">Vehicle Reg</label>
                                    <div class="controls">
                                    <input name="carReg" type="carReg" id="carReg" class="numberPlate" value="<?php echo $cust->carReg; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="insDate">Inspection Date</label>
                                    <div class="controls">
                                        <input type="date" id="insDate" name="insDate" value="<?php echo $cust->insDate; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="name">Customer Name</label>
                                    <div class="controls">
                                        <input type="text" id="name" name="name" value="<?php echo $cust->name; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="address">Customer Address</label>
                                    <div class="controls">
                                        <textarea id="address" name="address"><?php echo $cust->address; ?></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="postcode">Customer Postcode</label>
                                    <div class="controls">
                                        <input type="text" id="postcode" name="postcode" value="<?php echo $cust->postcode; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="home">Home Tel</label>
                                    <div class="controls">
                                        <input type="tel" id="home" name="home" value="<?php echo $cust->home; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="mob">Mobile Tel</label>
                                    <div class="controls">
                                        <input type="tel" id="mob" name="mob" value="<?php echo $cust->mob; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="email">Email Address</label>
                                    <div class="controls">
                                        <input type="email" id="email" name="email" value="<?php echo $cust->email; ?>" />
                                    </div>
                                </div>
                    </div>

                    <div class="span6">
                        <h4>Insurance Info</h4>

                                <div class="control-group">
                                    <label class="control-label" for="insName">Insurance Company Name</label>
                                    <div class="controls">
                                        <input type="text" id="insName" name="insName" value="<?php echo $cust->insName; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="insAdd">Insurance Company Address</label>
                                    <div class="controls">
                                        <textarea id="insAdd" name="insAdd"><?php echo $cust->insAdd; ?></textarea>
                                    </div>
                                    </div>

                                <div class="control-group">
                                    <label class="control-label" for="insPost">Insurance Company Postcode</label>
                                    <div class="controls">
                                        <input type="text" id="insPost" name="insPost" value="<?php echo $cust->insPost; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="insTel">Insurance Company Tel</label>
                                    <div class="controls">
                                        <input type="tel" id="insTel" name="insTel" value="<?php echo $cust->insTel; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="excess">Excess Amount</label>
                                    <div class="controls">
                                        <input type="number" id="excess" name="excess" value="<?php echo $cust->excess; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="vatReg">Vat Registered?</label>
                                    <div class="controls">
                                        <select id="vatReg" name="vatReg">
                                            <option>Select</option>
                                            <option value="1" <?php echo isSelected($cust->vatReg, 1); ?>>Yes</option>
                                            <option value="0" <?php echo isSelected($cust->vatReg, 0); ?>>No</option>
                                        </select>
                                    </div>
                                </div>

                    </div>

                        <div class="span12" style="margin-left:0px;">

                                <div class="control-group">
                                    <label class="control-label" for="damage">Bodywork Description</label>
                                    <div class="controls">
                                        <textarea id="damage" name="damage" class="span12"><?php echo $cust->damage; ?></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="special">Specialist / Sub-Contracted work</label>
                                    <div class="controls">
                                        <textarea id="special" name="special" class="span12"><?php echo $cust->special; ?></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="partsEst">Parts required</label>
                                    <div class="controls">
                                        <textarea id="partsEst" name="partsEst" class="span12"><?php echo $cust->partsEst; ?></textarea>
                                    </div>
                                </div>
                        </div>

                    <div class="clearfix"></div>
                </div>




                </div>
             <!-- End Row -->

            <div class="row-fluid" id="form">


                <div class="span6">
                    <div class="well">

                        <h4>Vehicle Info</h4>

                                <div class="control-group">
                                    <label class="control-label" for="make">Vehicle Make</label>
                                    <div class="controls">
                                        <input type="text" id="make" name="make" value="<?php echo $cust->make; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="model">Vehicle Model</label>
                                    <div class="controls">
                                        <input type="text" id="model" name="model" value="<?php echo $cust->model; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="mileage">Mileage</label>
                                    <div class="controls">
                                        <input type="number" id="mileage" name="mileage" value="<?php echo $cust->mileage; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="vin">Vin/Chassis Number</label>
                                    <div class="controls">
                                        <input type="text" id="vin" name="vin" value="<?php echo $cust->vin; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Tranmission</label>
                                    <div class="controls">
                                        <label class="radio">
                                            <input type="radio" name="trans" id="trans" value="Manual" <?php echo isChecked($cust->trans, "Manual"); ?> />
                                            Manual
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="trans" id="trans" value="Auto" <?php echo isChecked($cust->trans, "Auto"); ?> />
                                            Automatic
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="trans" id="trans" value="Unknown" <?php echo isChecked($cust->trans, "Unknown"); ?> />
                                            Unknown
                                        </label>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="colour">Colour</label>
                                    <div class="controls">
                                        <input type="text" id="colour" name="colour" value="<?php echo $cust->colour; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="fuel">Fuel Type</label>
                                    <div class="controls">
                                        <label class="radio">
                                            <input type="radio" name="fuel" id="fuel" value="Petrol" <?php echo isChecked($cust->fuel, "Petrol"); ?> />
                                            Petrol
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="fuel" id="fuel" value="Diesel" <?php echo isChecked($cust->fuel, "Diesel"); ?> />
                                            Diesel
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="fuel" id="fuel" value="Hybrid" <?php echo isChecked($cust->fuel, "Hybrid"); ?> />
                                            Hybrid
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="fuel" id="fuel" value="Electric" <?php echo isChecked($cust->fuel, "Electric"); ?> />
                                            Electric
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="fuel" id="fuel" value="LPG" <?php echo isChecked($cust->fuel, "LPG"); ?> />
                                            LPG
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="fuel" id="fuel" value="Unknown" <?php echo isChecked($cust->fuel, "Unknown"); ?> />
                                            Unknown
                                        </label>
                                    </div>
                                </div>
                    </div>
                </div>

                <div class="span6">

                    <div class="well">
                        <h4>Internal Use</h4>

                                <div class="control-group">
                                    <label class="control-label" for="statusId">Status</label>
                                    <div class="controls">
                                        <select id="statusId" name="statusId">
                                            <?php
                                                $s = "SELECT * FROM status";
                                                $sRes = mysql_query($s) or die (mysql_error());
                                                while ($status = mysql_fetch_object($sRes)):
                                            ?>
                                            <option value="<?php echo $status->statusId; ?>" <?php echo isSelected($cust->statusId, $status->statusId)?>><?php echo $status->folder; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Stage of Process</label>
                                    <div class="controls">

                                        <select id="statusId" name="statusId">
                                            <option value="">Select from below</option>
                                            <?php
                                                $s = "SELECT * FROM process";
                                                $sRes = mysql_query($s) or die (mysql_error());
                                                while ($process = mysql_fetch_object($sRes)):
                                            ?>
                                            <option value="<?php echo $process->processId; ?>" <?php echo isSelected($cust->processId, $process->processId)?>><?php echo $process->processfolder; ?></option>
                                            <?php endwhile; ?>
                                        </select>


                                    </div>
                                </div>

                                <div class="btn-group">
                                    <label class="control-label" for="seToyota"></label>
                                    <div class="controls">
                                        <label class="checkbox">
                                            <input type="hidden" name="seToyota" value="0" />
                                            <input type="checkbox" id="seToyota" name="seToyota" value="1" <?php echo isChecked($cust->seToyota, 1)?> />
                                            SE Toyota Vehicle
                                        </label>
                                    </div>
                                </div>

                    </div> <!-- End Well -->

                    <div class="well">

                      
                                <div class="control-group">
                                    <label class="control-label" for="estPrep">Estimate Prepared by:</label>
                                    <div class="controls">
                                        <input type="text" id="estPrep" name="estPrep" value="<?php echo $cust->estPrep; ?>" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="labRate">Labour Rate</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on">&pound;</span>
                                            <input type="number" id="labRate" name="labRate" value="<?php echo $cust->labRate; ?>">

                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="labHours">Total Hours</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on">Hr</span>
                                            <input type="number" id="labHours" name="labHours" value="<?php echo $cust->labHours; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="labEst">Total Labour</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on">&pound;</span>
                                            <input type="number" id="labEst" name="labEst" readonly="readonly" value="<?php echo $cust->labEst; ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="pandmEst">Paint & Materials</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on">&pound;</span>
                                            <input type="number" id="pandmEst" name="pandmEst" value="<?php echo $cust->pandmEst; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="partsTotal">Total Parts</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on">&pound;</span>
                                            <input type="number" id="partsTotal" name="partsTotal" value="<?php echo $cust->partsTotal; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="specialEst">Specialists Costs</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on">&pound;</span>
                                            <input type="number" id="specialEst" name="specialEst" value="<?php echo $cust->specialEst; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="recovEst">Recovery Charge</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on">&pound;</span>
                                            <input type="number" id="recovEst" name="recovEst" value="<?php echo $cust->recovEst; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="subtotEst">Sub-Total</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on">&pound;</span>
                                            <input type="number" id="subtotEst" name="subtotEst" readonly="readonly" value="<?php echo $cust->subtotEst; ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="vatEst">VAT amount</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on">&pound;</span>
                                            <input type="number" id="vatEst" name="vatEst" readonly="readonly" value="<?php echo $cust->vatEst; ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="totalEst">Total Estimate Cost</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on">&pound;</span>
                                            <input type="number" id="totalEst" name="totalEst" readonly="readonly" value="<?php echo $cust->totalEst; ?>" />
                                        </div>
                                    </div>
                                      </div>
                         </div>
            </div>
            </div>}
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