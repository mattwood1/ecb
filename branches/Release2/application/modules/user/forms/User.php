<?php
class User_Form_User extends Twitter_Bootstrap_Form_Horizontal
{
    public function init()
    {
        $this->setAttrib('horizontal', true);

        $this->addElement('text', 'username', array (
                'label'     => 'Username',
        ));
        $this->addElement('text', 'password', array (
                'label'     => 'Password'
        ));
        $this->addElement('textarea', 'name', array (
                'label'     => 'Name'
        ));
        $this->addElement('text', 'email', array (
                'label'     => 'Email Address'
        ));

        $this->addElement('hidden', 'userId', array (
                'value'           => $this->_userId
        ));

        $this->addElement("submit", "save", array("label" => "Save"));
    }
}