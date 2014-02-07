<?php
class IndexController extends Coda_Controller
{
    public function indexAction()
    {
        $this->view->statuses     = ECB_Model_JobStatusTable::getInstance()->findAll();;
        $this->view->processes    = ECB_Model_JobProcessTable::getInstance()->findAll();
    }
}