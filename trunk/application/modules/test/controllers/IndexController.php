<?php
class test_IndexController extends Coda_Controller
{
    public function init()
    {
        /* Initialize action controller here */
        if (! $this->_request->user) {
            $requestUrl = new Zend_Session_Namespace('requestUrl');
            $requestUrl->url = $this->_request->getRequestUri();

            $this->_flash('To view Jobs A user must be Logged in', Coda_Helper_Flash::INFO);
            $this->gotoRoute(array('module' => 'user', 'controller' => 'auth', 'action' => 'login'));
        }
    }

    public function indexAction()
    {
        $jobs = Doctrine_Core::getTable('Coda_Model_Job')->findAll();
        $this->view->jobs=$jobs;
         $this->_disableLayout();
         $mail = new Zend_Mail();
          $mail->setBodyText('My Nice Test Text');
$mail->setBodyHtml('My Nice <b>Test</b> Text');
$mail->setFrom('chris@cwtkd.co.uk', 'Chris');
$mail->addTo('chrisw6152@yahoo.co.uk', 'Chris Wood');
$mail->setSubject('TestSubject');
$mail->send();
        

    

    }
}