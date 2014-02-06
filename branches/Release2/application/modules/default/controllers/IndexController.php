<?php
class IndexController extends Coda_Controller
{
    public function indexAction()
    {
        $this->view->wip          = ECB_Model_JobTable::getInstance()->findBy('jobStatusId', ECB_Model_JobTable::WIP);
        $this->view->bookedIn     = ECB_Model_JobTable::getInstance()->findBy('jobStatusId', ECB_Model_JobTable::BOOKED_IN);
        $this->view->toBeBookedIn = ECB_Model_JobTable::getInstance()->findBy('jobStatusId', ECB_Model_JobTable::TO_BOOK_IN);

        $this->view->statuses     = ECB_Model_JobStatusTable::getInstance()->findAll();;
        $this->view->processes    = ECB_Model_JobProcessTable::getInstance()->findAll();
    }
}