<?php
class Coda_View_Helper_Auth extends Zend_View_Helper_Abstract
{
    public function auth()
    {
        return $this;
    }

    public function isLoggedIn()
    {
        return Zend_Auth::getInstance()->hasIdentity();
    }

    public function getEmail()
    {
        return Zend_Auth::getInstance()->getIdentity();
    }

    public function getUser()
    {
        if (! $this->isLoggedIn()) {
            return false;
        }
        return Doctrine_Core::getTable('Coda_Model_User')->findOneBy('email', Zend_Auth::getInstance()->getIdentity());
    }
}
