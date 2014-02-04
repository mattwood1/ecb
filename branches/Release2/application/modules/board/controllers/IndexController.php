<?php

class Board_IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $strip = Doctrine_Query::create()->select('*')
                                            ->from('ECB_Model_Job')
                                            ->where('jobStatusId = 4 AND jobProcessId = ?', '1'); // Strip

        $polishFit = Doctrine_Query::create()->select('*')
                                            ->from('ECB_Model_Job')
                                            ->where('jobStatusId = 4 AND jobProcessId = ?', '2') // Polish
                                            ->orWhere('jobStatusId = ?', '5');                   // Fit

        $paint = Doctrine_Query::create()->select('*')
                                            ->from('ECB_Model_Job')
                                            ->where('jobStatusId = 4 AND jobProcessId = ?', '3'); // Paint

        $repair = Doctrine_Query::create()->select('*')
                                            ->from('ECB_Model_Job')
                                            ->where('jobStatusId = 4 AND jobProcessId = ?', '4'); // Repair

        $prime = Doctrine_Query::create()->select('*')
                                            ->from('ECB_Model_Job')
                                            ->where('jobStatusId = 4 AND jobProcessId = ?', '5'); // Prime

        $wash = Doctrine_Query::create()->select('*')
                                            ->from('ECB_Model_Job')
                                            ->where('jobStatusId = 4 AND (jobProcessId = 5 OR jobProcessId = 6)'); // Wash

        $statuses = Doctrine_Core::getTable('ECB_Model_JobStatus')->findAll();

        $processes = Doctrine_Core::getTable('ECB_Model_JobProcess')->findAll();

        //$this->view->wip = $wip->execute();
        $this->view->strip      = $strip->execute();
        $this->view->polishFit  = $polishFit->execute();
        $this->view->paint      = $paint->execute();
        $this->view->repair     = $repair->execute();
        $this->view->prime      = $prime->execute();
        $this->view->wash       = $wash->execute();
        $this->view->processes  = $processes;
    }


}

