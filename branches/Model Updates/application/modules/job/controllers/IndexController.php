<?php
class Job_IndexController extends Coda_Controller
{
    public function init()
    {
        /* Initialize action controller here */
        if (! $this->_request->user) {
            $requestUrl = new Zend_Session_Namespace('requestUrl');
            $requestUrl->url = $this->_request->getRequestUri();

            $this->_flash('To view Jobs A user must be Logged in', Coda_Helper_Flash::INFO);
            $this->gotoRoute(array('module' => 'user', 'controller' => 'auth', 'action' => 'login'));
        }
    }

    public function indexAction()
    {
        $jobs = Doctrine_Query::create()->select('*')->from('Coda_Model_Job')->orderBy('dateModified DESC');
        $statuses = Doctrine_Core::getTable('Coda_Model_JobStatus')->findAll();
        $processes = Doctrine_Core::getTable('Coda_Model_JobProcess')->findAll();

        $this->view->jobs = $jobs->execute();
        $this->view->statuses = $statuses;
        $this->view->processes = $processes;
    }
    protected function numberplateformat($numberPlate)
    {
        if (!strstr($numberPlate, " ")) {
            return chunk_split(strtoupper($numberPlate), 4, ' ');
        }
        return $numberPlate;
    }

    public function addAction()
    {
        $form = new Job_Form_Job();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $zfDate = new Zend_Date();
            $job = Doctrine_Core::getTable('Coda_Model_Job')->create(
                    array_merge($form->getValues(), array(
                            'dateCreated' => $zfDate->get(Zend_Date::ISO_8601),
                            'carReg' => $this->numberplateformat($form->getValue('carReg')))
                    ));
            $job->save();
            $this->gotoRoute(array('action' => 'index', 'job' => null));
            $this->_flash('Job Added');
        }

        $this->view->form = $form;
    }

    public function editAction()
    {
        $jobForm = new Job_Form_Job();
        $jobPartForm = new Job_Form_JobPart(array('job' => $this->_request->getParam('job')));
        $jobNoteForm = new Job_Form_JobNote(array('job' => $this->_request->getParam('job')));
        $jobCardForm = new Job_Form_JobCard(array('job' => $this->_request->getParam('job')));

        if ($this->_request->getParam('job')) {
            $job = Doctrine_Core::getTable('Coda_Model_Job')->findOneBy('jobId', $this->_request->getParam('job'));

            if ($this->_request->isPost() && $jobForm->isValid($this->_request->getPost())) {
                $job->fromArray(array_merge(
                        $jobForm->getValues(),
                        array(
                        'carReg' => $this->numberplateformat($jobForm->getValue('carReg')))
                        ));
                $job->save();
                $this->gotoRoute(array('action' => 'index', 'job' => null));
                $this->_flash('Job Updated');
            }

            $jobForm->populate($job->toArray());
            // Job Data
            $this->view->job = $job;

            // Form Elements
            $this->view->jobForm = $jobForm;
            $this->view->jobPartForm = $jobPartForm;
            $this->view->jobCardForm = $jobCardForm;
            $this->view->jobNoteForm = $jobNoteForm;

        } else {
            $this->gotoRoute(array('action' => 'index'));
        }
    }

    public function setStatusAction()
    {
        $job = Doctrine_Core::getTable('Coda_Model_Job')->findOneBy('jobId', $this->_request->getParam('job'));
        $job->jobStatusId = $this->_request->getParam('status');
        $job->save();
        $this->_redirectBack();
    }

    public function setProcessAction()
    {
        $job = Doctrine_Core::getTable('Coda_Model_Job')->findOneBy('jobId', $this->_request->getParam('job'));
        $job->jobProcessId = $this->_request->getParam('process');
        $job->save();
        $this->_redirectBack();
    }

    public function searchAction()
    {
        $this->_disableLayout();

        $jobs = Doctrine_Query::create()->select('*')->from('Coda_Model_Job');

        if ($this->_request->getParam('keyword')) {
            //$jobs->where('MATCH (carReg, name, address, postcode, make, model ) AGAINST (? IN BOOLEAN MODE)', $this->_request->getParam('keyword'));
            $jobs->where('carReg LIKE ?', '%'.$this->_request->getParam('keyword').'%')
                 ->orWhere('name LIKE ?', '%'.$this->_request->getParam('keyword').'%')
                 ->orWhere('make LIKE ?', '%'.$this->_request->getParam('keyword').'%')
                 ->orWhere('model LIKE ?', '%'.$this->_request->getParam('keyword').'%')
                 ->orWhere('vin LIKE ?', '%'.$this->_request->getParam('keyword').'%')
                 ->orWhere('postcode LIKE ?', '%'.$this->_request->getParam('keyword').'%');
        }

        if ($this->_request->getParam('status')) {
            $jobs->where('jobStatusId = ?', $this->_request->getParam('status'));
        }

        if ($this->_request->getParam('process')) {
            $jobs->where('jobProcessId = ?', $this->_request->getParam('process'));
        }

        $jobs->orderBy('dateModified DESC');

        //var_dump($jobs->getSqlQuery());exit;

        $statuses = Doctrine_Core::getTable('Coda_Model_JobStatus')->findAll();
        $processes = Doctrine_Core::getTable('Coda_Model_JobProcess')->findAll();

        $this->view->jobs = $jobs->execute();
        $this->view->statuses = $statuses;
        $this->view->processes = $processes;

        $this->renderScript('partials/index-table.phtml');
    }

    /**
     * Adds a part to the job (AJAX)
     */
    public function addPartAction()
    {
        $this->_disableLayout();

        $jobPartForm = new Job_Form_JobPart(array('job' => $this->_request->getParam('jobId')));

        if ($this->_request->isPost() && $jobPartForm->isValid($this->_request->getPost())) {
            $zfDate = new Zend_Date();
            $jobPart = Doctrine_Core::getTable('Coda_Model_JobPart')->create(
                    array_merge($jobPartForm->getValues(), array(
                            'dateCreated' => $zfDate->get(Zend_Date::ISO_8601))
                    ));
            $jobPart->save();
            $this->_flash('Part Added');
        }

        $job = Doctrine_Core::getTable('Coda_Model_Job')->findOneBy('jobId', $this->_request->getParam('jobId'));

        $this->view->job = $job;
        $this->view->parts = $job->parts;

        $this->renderScript('partials/job-part.phtml');
    }

    /**
     * Deletes a part from a job (AJAX)
     */
    public function deletePartAction()
    {
        $this->_disableLayout();

        $jobPart = Doctrine_Core::getTable('Coda_Model_JobPart')->findBy('jobPartId', $this->_request->getParam('part'));
        $jobPart->delete();

        $job = Doctrine_Core::getTable('Coda_Model_Job')->findOneBy('jobId', $this->_request->getParam('job'));

        $this->view->parts = $job->parts;
        $this->_flash('Part Deleted');

        $this->renderScript('partials/job-part.phtml');
    }

    /**
     * Adds a note to the job (AJAX)
     */
    public function addNoteAction()
    {
        $this->_disableLayout();

        $jobNoteForm = new Job_Form_JobNote(array('job' => $this->_request->getParam('jobId')));

        if ($this->_request->isPost() && $jobNoteForm->isValid($this->_request->getPost())) {
            $zfDate = new Zend_Date();
            $jobNote = Doctrine_Core::getTable('Coda_Model_JobNote')->create(
                    array_merge($jobNoteForm->getValues(),
                            array(
                                    'dateCreated' => $zfDate->get(Zend_Date::ISO_8601),
                                    'userId' => $this->_request->user->userId
                                )
                    )
            );
            $jobNote->save();
            $this->_flash('Note Added');
        }

        $job = Doctrine_Core::getTable('Coda_Model_Job')->findOneBy('jobId', $this->_request->getParam('jobId'));

        $this->view->notes = $job->notes;

        $this->renderScript('partials/job-note.phtml');
    }

    /**
     * Add an image to the job
     */
    public function addImageAction()
    {
        // Resize the image to no greater than 800x800 keeping aspect ratio
    }

    /**
     * TODO: You need to explain what the job card thingy is...(job card thingy is the amount of hours allocated to each field for the job)
     */
    public function addJobCardAction()
    {
        $this->_disableLayout();

        $jobCardForm = new Job_Form_JobCard(array('job' => $this->_request->getParam('jobId')));

        if ($this->_request->isPost() && $jobCardForm->isValid($this->_request->getPost())) {
            $zfDate = new Zend_Date();
            $jobCart = Doctrine_Core::getTable('Coda_Model_JobCard')->create(
                    array_merge($jobCardForm->getValues(), array(
                            'dateCreated' => $zfDate->get(Zend_Date::ISO_8601))
                    ));
            $jobCard->save();
            $this->_flash('Hours Added');
        }

        $job = Doctrine_Core::getTable('Coda_Model_Job')->findOneBy('jobId', $this->_request->getParam('jobId'));

        $this->view->job = $job;
        $this->view->jobCard = $job->card;

        $this->renderScript('partials/job-card.phtml');

    }

}