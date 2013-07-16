<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body

        $wip = Doctrine_Query::create()->select('*')->from('Coda_Model_Job')->where('jobStatusId = ?', '4');
        $bookedIn = Doctrine_Query::create()->select('*')->from('Coda_Model_Job')->where('jobStatusId = ?', '3');
        $toBeBookedIn = Doctrine_Query::create()->select('*')->from('Coda_Model_Job')->where('jobStatusId = ?', '2');
        $rdyToInvoice = Doctrine_Query::create()->select('*')->from('Coda_Model_Job')->where('jobStatusId = ?', '5');
        $statuses = Doctrine_Core::getTable('Coda_Model_JobStatus')->findAll();
        $processes = Doctrine_Core::getTable('Coda_Model_JobProcess')->findAll();
     // {  $diary = Doctrine_Core::getTable('Coda_Model_Diary')->create($form->getValues());
       //     $diary->save();
        //    $form->reset();}
            

        $this->view->wip = $wip->execute();
        $this->view->bookedIn = $bookedIn->execute();
        $this->view->toBeBookedIn = $toBeBookedIn->execute();
        $this->view->rdyToInvoice = $rdyToInvoice->execute();
        $this->view->statuses = $statuses;
        $this->view->processes = $processes;
        
    }


}

