<?php

class Board_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body

        $wip = Doctrine_Query::create()->select('*')
                                            ->from('Coda_Model_Job')
                                            ->where('jobStatusId = ?', '4')
                                            ->where('jobProcessId is null'); // Repair ?

        $repair = Doctrine_Query::create()->select('*')
                                            ->from('Coda_Model_Job')
                                            ->where('jobStatusId = ?', '4')
                                            ->where('jobProcessId = ?', '1'); // Repair ?

        $prime = Doctrine_Query::create()->select('*')
                                            ->from('Coda_Model_Job')
                                            ->where('jobStatusId = ?', '4')
                                            ->where('jobProcessId = ?', '2'); // Prime ?

        $paint = Doctrine_Query::create()->select('*')
                                            ->from('Coda_Model_Job')
                                            ->where('jobStatusId = ?', '4')
                                            ->where('jobProcessId = ?', '3'); // Paint ?

        $fit = Doctrine_Query::create()->select('*')
                                            ->from('Coda_Model_Job')
                                            ->where('jobStatusId = ?', '4')
                                            ->where('jobProcessId = ?', '4'); // Fit ?

        $polishWash = Doctrine_Query::create()->select('*')
                                            ->from('Coda_Model_Job')
                                            ->where('jobStatusId = ?', '4')
                                            ->where('jobProcessId = ?', '5') // Polish ?
                                            ->orWhere('jobProcessId = ?', '6'); // Wash ?

        //$this->view->wip = $wip->execute();
        $this->view->wip        = $wip->execute();
        $this->view->repair     = $repair->execute();
        $this->view->prime      = $prime->execute();
        $this->view->paint      = $paint->execute();
        $this->view->fit        = $fit->execute();
        $this->view->polishWash = $polishWash->execute();
    }


}

