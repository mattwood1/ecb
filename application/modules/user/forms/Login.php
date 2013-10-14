<?php
class User_Form_Login extends Twitter_Bootstrap_Form_Vertical
{
    public function init()
    {
        // Make this form horizontal
        $this->setAttrib('class', 'separate-sections');

        $this->addElement("text", "email", array(
        //    "label" => "Email",
                'required'    => true,
                'placeholder' => 'Your email address',
                'prepend'       => '@',
                'class' => 'span12'
        ))

        ->addElement("password", "password", array(
        //    "label" => "Password",
            "required" => true,
            "placeholder" => "Your password",
            'class' => 'span12'
        ))

        ->addElement("submit", "login", array("label" => 'Log in'))

        /*
        ->addElement('Link', 'forgotton', array(
                'label' => 'Forgotton Password',
                'url' => array('action' => 'forgotton')
        ))
        /*
        ->addElement("link", 'register', array(
                'label' => 'Registration',
                'url' => array('action' => 'registration')
        ))
        */
        ;
    }
}