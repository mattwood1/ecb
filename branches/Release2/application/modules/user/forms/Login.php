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
                'prepend'       => '<i class="fa fa-user"></i>',
                'class' => 'span12'
        ))

        ->addElement("password", "password", array(
        //    "label" => "Password",
                'required' => true,
                'placeholder' => 'Your password',
                'prepend' => '<i class="fa fa-lock"></i>',
                'class' => 'span12'
        ))

        ->addElement('button', 'submit', array(
                'type'          => 'submit',
                'buttonType'    => 'success',
                'icon'          => 'signin',
                'label'         => 'Log in',
                'iconPosition'  => 'right',
                'escape'        => false
        ));
    }
}