<?php
class User_Form_Registration extends Twitter_Bootstrap_Form_Horizontal
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

        ->addElement("password", "password", array(
                "label" => "Password",
                "required" => true,
                "placeholder" => "Your password",
                "validators"  => array(array('StringLength', false, array(4,15))),
                "errorMessage" => array('Please choose a password between 4-15 characters')

        ))

        ->addElement("password", "passwordConfirm", array(
                "label" => "Password Confirm",
                "required" => true,
                "placeholder" => "Confirm your password",
                "validators" => array(array("identical", false, array("token" => "password"))),
                "errorMessage" => array("Please choose a password between 4-15 characters")
        ))

        ->addElement("submit", "submit", array(
                'buttonType' => Twitter_Bootstrap_Form_Element_Submit::BUTTON_SUCCESS,
                "label" => "Save"
        ));

    }
}