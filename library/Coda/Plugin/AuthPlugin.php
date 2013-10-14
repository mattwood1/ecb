<?php
class Coda_Plugin_AuthPlugin extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $auth = Zend_Auth::getInstance();
        if (! $auth->hasIdentity()) {
            // Defer more complex authentication logic to AuthController

            if (
                    ($this->getRequest()->getModuleName() == 'user' && $this->getRequest()->getControllerName() == 'auth' && $this->getRequest()->getActionName() == 'login')
                    || ($this->getRequest()->getModuleName() == 'board')
                ) {
                // Process normally
            } else {
                // Login Required
                $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                $redirector->gotoSimple('login', 'auth', 'user');
            }
        }
    }
}
