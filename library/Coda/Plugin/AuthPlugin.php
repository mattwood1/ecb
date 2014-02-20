<?php
class Coda_Plugin_AuthPlugin extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $auth = Zend_Auth::getInstance();

        if (! $auth->hasIdentity()) {
            $requestUrl = new Zend_Session_Namespace('requestUrl');

            Zend_Registry::set('current_user', 'notAuthenticatedUser');
            if (! Coda_Plugin_AclPlugin::_checkAccess(Zend_Registry::get('current_user'), $this->getRequest()->getControllerName(), $this->getRequest()->getActionName())) {
                $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                $redirector->gotoSimple('login', 'auth', 'user');
            }

            $user = null;
        } else {
            Zend_Registry::set('current_user', $auth->getIdentity());
            if (! Coda_Plugin_AclPlugin::_checkAccess(Zend_Registry::get('current_user'), $this->getRequest()->getControllerName(), $this->getRequest()->getActionName())) {

                // Flash message
                $flash = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger')
                    ->addMessage('You do not have access.', 'danger');

                $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                //$redirector->gotoSimple('index', 'index', 'default');
            }
            $user     = Doctrine_Core::getTable('ECB_Model_User')->findOneBy('email', $auth->getIdentity()->email);
        }

        $flash = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger')
            ->addMessage(Zend_Registry::get('current_user'), 'danger');

        $request->setParam('user', $user);

        _d($user);
    }
}
