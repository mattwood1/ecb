<?php
class User_IndexController extends Coda_Controller
{

    public function init()
    {
        /* Initialize action controller here */
        if (! $this->_request->user) {
            $requestUrl = new Zend_Session_Namespace('requestUrl');
            $requestUrl->url = $this->_request->getRequestUri();

            $this->_flash('Users requires the user to be logged in', Coda_Helper_Flash::INFO);
            $this->gotoRoute(array('module' => 'user', 'controller' => 'auth', 'action' => 'login'));
        }
    }

    public function indexAction()
    {
        $users = Doctrine_Core::getTable('ECB_Model_User')->findAll();

        $this->view->title = "User Administration";
        $this->view->users = $users;
    }
}