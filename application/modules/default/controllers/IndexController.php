<?php
class IndexController extends Coda_Controller
{
    public function init()
    {
        /* Initialize action controller here */
        if (! $this->_request->user) {
            $requestUrl = new Zend_Session_Namespace('requestUrl');
            $requestUrl->url = $this->_request->getRequestUri();

            $this->_flash('Dashboard requires the user to be logged in', Coda_Helper_Flash::INFO);
            $this->gotoRoute(array('module' => 'user', 'controller' => 'auth', 'action' => 'login'));
        }
    }

    public function indexAction()
    {
        $wip = Doctrine_Query::create()->select('*')->from('Coda_Model_Job')->where('jobStatusId = ?', '4');
        $bookedIn = Doctrine_Query::create()->select('*')->from('Coda_Model_Job')->where('jobStatusId = ?', '3');
        $toBeBookedIn = Doctrine_Query::create()->select('*')->from('Coda_Model_Job')->where('jobStatusId = ?', '2');
        $rdyToInvoice = Doctrine_Query::create()->select('*')->from('Coda_Model_Job')->where('jobStatusId = ?', '5');
        $statuses = Doctrine_Core::getTable('Coda_Model_JobStatus')->findAll();
        $processes = Doctrine_Core::getTable('Coda_Model_JobProcess')->findAll();

        $this->view->wip = $wip->execute();
        $this->view->rdyToInvoice = $rdyToInvoice->execute();
        $this->view->bookedIn = $bookedIn->execute();
        $this->view->toBeBookedIn = $toBeBookedIn->execute();
        $this->view->statuses = $statuses;
        $this->view->processes = $processes;
    }
}