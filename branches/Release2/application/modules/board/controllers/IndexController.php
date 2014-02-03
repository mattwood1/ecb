<?php

class Board_IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $wip = Doctrine_Query::create()->select('*')
                                            ->from('ECB_Model_Job')
                                            ->where('jobStatusId = ?', '4');

        $strip = Doctrine_Query::create()->select('*')
                                            ->from('ECB_Model_Job')
                                            ->where('jobStatusId = 4 AND jobProcessId = ?', '1'); // Repair ?

        $fit = Doctrine_Query::create()->select('*')
                                            ->from('ECB_Model_Job')
                                            ->where('jobStatusId = 4 AND jobProcessId = ?', '2'); // Repair ?

        $paint = Doctrine_Query::create()->select('*')
                                            ->from('ECB_Model_Job')
                                            ->where('jobStatusId = 4 AND jobProcessId = ?', '3'); // Prime ?

        $repair = Doctrine_Query::create()->select('*')
                                            ->from('ECB_Model_Job')
                                            ->where('jobStatusId = 4 AND jobProcessId = ?', '4'); // Paint ?

        $prime = Doctrine_Query::create()->select('*')
                                            ->from('ECB_Model_Job')
                                            ->where('jobStatusId = 4 AND jobProcessId = ?', '5'); // Fit ?

        $polishWash = Doctrine_Query::create()->select('*')
                                            ->from('ECB_Model_Job')
                                            ->where('jobStatusId = 4 AND (jobProcessId = 5 OR jobProcessId = 6)'); // Wash ?

        $statuses = Doctrine_Core::getTable('ECB_Model_JobStatus')->findAll();
        $processes = Doctrine_Core::getTable('ECB_Model_JobProcess')->findAll();

        //$this->view->wip = $wip->execute();
        $this->view->strip      = $strip->execute();
        $this->view->fit        = $fit->execute();
        $this->view->paint      = $paint->execute();
        $this->view->repair     = $repair->execute();
        $this->view->prime      = $prime->execute();
        $this->view->polishWash = $polishWash->execute();
        $this->view->processes  = $processes;
    }


}

