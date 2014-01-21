<?php
class test_IndexController extends Coda_Controller
{
    public function indexAction()
    {
        $jobs = Doctrine_Core::getTable('ECB_Model_Job')->findAll();
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