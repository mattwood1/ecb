<?php
class Auth_Form_ResetPassword extends Twitter_Bootstrap_Form_Horizontal
{
    public function setup()
    {
        $this->addElement('password', 'password', array(
            'label' => 'Password',
            'required' => true,
            'filters' => array('StripTags', 'StringTrim'),
            'validators' => array('Alnum')
        ));

        $this->addElement('password', 'password2', array(
            'label' => 'Re-type Password',
            'required' => true,
            'filters' => array('StripTags', 'StringTrim'),
            'validators' => array('Alnum', array('identical', false, array('token' => 'password')))
        ));

        $this->addSubmit('OK');
    }
}