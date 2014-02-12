<?php
class User_Form_User extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        $this->addElement("text", "name", array(
                "label" => "Name",
                "placeholder" => "Your name",
                "required" => true
       ))

       ->addElement("text", "email", array(
                "label" => "Email Address",
                "required" => true,
                "placeholder" => "Your email address",
                "validators" => array(
                        'EmailAddress',
                        'validator'        => new Coda_Doctrine_Validate_NoRecordExists('ECB_Model_User', 'email')
                )
        ))

        ->addElement("submit", "submit", array(
                'buttonType' => Twitter_Bootstrap_Form_Element_Submit::BUTTON_SUCCESS,
                "label" => "Save"
        ));

    }
}