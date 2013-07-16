<?php
class Report_IndexController extends Coda_Controller
{
    public function indexAction()
    {

    }

    public function report1Action()
    {
        $this->_disableLayout();

        if (! $this->_request->getParam('jobId')) {
            $this->gotoRoute(array('action' => 'index'));
        }
        $job = Doctrine_Core::getTable('Coda_Model_Job')->findOneBy('jobId', $this->_request->getParam('jobId'));
        $this->view->job = $job;
    }
}