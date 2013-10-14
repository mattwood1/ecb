<?php
class IndexController extends Coda_Controller
{
    public function indexAction()
    {
        $wip = Doctrine_Query::create()->select('*')->from('ECB_Model_Job')->where('jobStatusId = ?', '4');
        $bookedIn = Doctrine_Query::create()->select('*')->from('ECB_Model_Job')->where('jobStatusId = ?', '3');
        $toBeBookedIn = Doctrine_Query::create()->select('*')->from('ECB_Model_Job')->where('jobStatusId = ?', '2');
        $rdyToInvoice = Doctrine_Query::create()->select('*')->from('ECB_Model_Job')->where('jobStatusId = ?', '5');
        $statuses = Doctrine_Core::getTable('ECB_Model_JobStatus')->findAll();
        $processes = Doctrine_Core::getTable('ECB_Model_JobProcess')->findAll();

        $this->view->wip = $wip->execute();
        $this->view->rdyToInvoice = $rdyToInvoice->execute();
        $this->view->bookedIn = $bookedIn->execute();
        $this->view->toBeBookedIn = $toBeBookedIn->execute();
        $this->view->statuses = $statuses;
        $this->view->processes = $processes;
    }
}