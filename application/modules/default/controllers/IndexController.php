<?php
class IndexController extends Coda_Controller
{
    public function indexAction()
    {
        $wipJobTable = new ECB_Model_JobTable();
        $wipJobTable->getJobs();
        $wipJobTable->filterStatus(ECB_Model_JobTable::WIP);
        $wipJobTable->orderJobs('CASE jobSource WHEN "TMI" THEN 1 ELSE 2 END ');
        $wip = $wipJobTable->getQuery()->execute();

        $bookedJobTable = new ECB_Model_JobTable();
        $bookedJobTable->getJobs();
        $bookedJobTable->filterStatus(ECB_Model_JobTable::BOOKED_IN);
        $bookedJobTable->orderJobs('CASE jobSource WHEN "TMI" THEN 1 ELSE 2 END ');
        $bookedIn = $bookedJobTable->getQuery()->execute();

        $toBookJobTable = new ECB_Model_JobTable();
        $toBookJobTable->getJobs();
        $toBookJobTable->filterStatus(ECB_Model_JobTable::TO_BOOK_IN);
        $toBookJobTable->orderJobs('CASE jobSource WHEN "TMI" THEN 1 ELSE 2 END ');
        $toBookIn = $toBookJobTable->getQuery()->execute();

        $this->view->wip          = $wip;
        $this->view->bookedIn     = $bookedIn;
        $this->view->toBeBookedIn = $toBookIn;

        $this->view->statuses     = ECB_Model_JobStatusTable::getInstance()->findAll();;
        $this->view->processes    = ECB_Model_JobProcessTable::getInstance()->findAll();
    }
}