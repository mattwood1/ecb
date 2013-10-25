<?php
class Job_IndexController extends Coda_Controller
{
    public function indexAction()
    {
        $jobTable = new ECB_Model_JobTable();
        $jobTable->getJobs();

        if ($this->_request->getParam('keyword')) {
            $jobTable->searchJobs($this->_request->getParam('keyword'));
        }

        if ($this->_request->getParam('status')) {
            $jobTable->filterStatus($this->_request->getParam('status'));
        }

        if ($this->_request->getParam('process')) {
            $jobTable->filterProcess($this->_request->getParam('process'));
        }

        $jobTable->orderJobs('dateModified DESC');
        $jobs = $jobTable->getQuery();

        $statuses = Doctrine_Core::getTable('ECB_Model_JobStatus')->findAll();
        $processes = Doctrine_Core::getTable('ECB_Model_JobProcess')->findAll();

        $this->view->jobs = $jobs->execute();
        $this->view->statuses = $statuses;
        $this->view->processes = $processes;
    }

    public function addAction()
    {
        $form = new Job_Form_Job();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $zfDate = new Zend_Date();
            $job = Doctrine_Core::getTable('ECB_Model_Job')->create(
                    array_merge($form->getValues(), array(
                            'dateCreated' => $zfDate->get(Zend_Date::ISO_8601),
                            'carReg' => $this->numberplateformat($form->getValue('carReg')),
                            'postcode' => strtoupper($form->getValue('postcode'))
                    ))
                );
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
            $job = Doctrine_Core::getTable('ECB_Model_Job')->findOneBy('jobId', $this->_request->getParam('job'));

            if ($this->_request->isPost() && $jobForm->isValid($this->_request->getPost())) {
                $job->fromArray(
                        array_merge($jobForm->getValues(), array(
                            'carReg' => $this->numberplateformat($jobForm->getValue('carReg')),
                            'postcode' => strtoupper($jobForm->getValue('postcode'))
                        ))
                    );
                $job->save();
                $this->gotoRoute(array('action' => 'index', 'job' => null));
                $this->_flash('Job Updated');
            }

            //Form population
            $jobForm->populate($job->toArray());
            $jobCard = Doctrine_Core::getTable('ECB_Model_JobCard')->findOneBy('jobId', $this->_request->getParam('job'));
            if ($jobCard) {
                $jobCardForm->populate($jobCard->toArray());
            }

            // Form Elements
            $this->view->job = $job;
            $this->view->jobForm = $jobForm;
            $this->view->jobPartForm = $jobPartForm;
            $this->view->jobCardForm = $jobCardForm;
            $this->view->jobNoteForm = $jobNoteForm;

        } else {
            $this->gotoRoute(array('action' => 'index'));
        }
    }

    public function uploadAction()
    {
        // HTTP headers for no cache etc
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        $this->_disableLayout();

        $jobId = $this->_request->getParam('job');

        // Settings
        $rootDir = "jobUploads";
        $targetDir = $rootDir . DIRECTORY_SEPARATOR . $jobId;
        $thumbDir = $targetDir . DIRECTORY_SEPARATOR . 'thumbs';

        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds

        // 5 minutes execution time
        @set_time_limit(5 * 60);

        // Uncomment this one to fake upload time
        // usleep(5000);

        // Get parameters
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';

        // Clean the fileName for security reasons
        $fileName = preg_replace('/[^\w\._]+/', '_', $fileName);

        $origFilename = $fileName;

        // Make sure the fileName is unique but only if chunking is disabled
        if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) {
            $ext = strrpos($fileName, '.');
            $fileName_a = substr($fileName, 0, $ext);
            $fileName_b = substr($fileName, $ext);

            $count = 1;
            while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
                $count++;

            $fileName = $fileName_a . '_' . $count . $fileName_b;
        }

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
        $thumbPath = $thumbDir . DIRECTORY_SEPARATOR . $fileName;

        // Create Directories
        if (!file_exists($rootDir))
            @mkdir($rootDir);

        // Create target dir
        if (!file_exists($targetDir))
            @mkdir($targetDir);

        // Create thumb dir
        if (!file_exists($thumbDir))
            @mkdir($thumbDir);

        // Remove old temp files
        if ($cleanupTargetDir && is_dir($targetDir) && ($dir = opendir($targetDir))) {
            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge) && ($tmpfilePath != "{$filePath}.part")) {
                    @unlink($tmpfilePath);
                }
            }

            closedir($dir);
        } else
            die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');

        // Look for the content type header
        if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
            $contentType = $_SERVER["HTTP_CONTENT_TYPE"];

        if (isset($_SERVER["CONTENT_TYPE"]))
            $contentType = $_SERVER["CONTENT_TYPE"];

        // Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
        if (strpos($contentType, "multipart") !== false) {
            if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                // Open temp file
                $out = fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
                if ($out) {
                    // Read binary input stream and append it to temp file
                    $in = fopen($_FILES['file']['tmp_name'], "rb");

                    if ($in) {
                        while ($buff = fread($in, 4096))
                            fwrite($out, $buff);
                    } else
                        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                    fclose($in);
                    fclose($out);
                    @unlink($_FILES['file']['tmp_name']);
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
        } else {
            // Open temp file
            $out = fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
            if ($out) {
                // Read binary input stream and append it to temp file
                $in = fopen("php://input", "rb");

                if ($in) {
                    while ($buff = fread($in, 4096))
                        fwrite($out, $buff);
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');

                fclose($in);
                fclose($out);
            } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        // Check if file has been uploaded
        if (!$chunks || $chunk == $chunks - 1) {
            // Strip the temp .part suffix off
            rename("{$filePath}.part", $filePath);

            $resizer = new Coda_Image_Resizer($filePath);
            $resizer->resizeImage(66, 55, 'crop')->save($thumbPath, 80);

            $jobImageTable = new ECB_Model_JobImageTable();
            $jobImage = $jobImageTable->getInstance();

            $image = $jobImage->createQuery('i')
                ->where('jobId = ?', $jobId)
                ->andwhere('file = ?', DIRECTORY_SEPARATOR . $filePath)
                ->execute();

            if (!$image->toArray()) {
                $jobImage->create(array(
                    'jobId' => $jobId,
                    'file'  => DIRECTORY_SEPARATOR . $filePath,
                    'thumb' => DIRECTORY_SEPARATOR . $thumbPath,
                    'dateCreated' => date("Y-m-d H:i:s", mktime())
                ))->save();
            } else {
                $image->fromArray(array(
                        'thumb' => DIRECTORY_SEPARATOR . $thumbPath
                    ));
                $image->save();
            }
        }
        exit;
    }

    public function setStatusAction()
    {
        $job = Doctrine_Core::getTable('ECB_Model_Job')->findOneBy('jobId', $this->_request->getParam('job'));
        $job->jobStatusId = $this->_request->getParam('status');
        $job->save();
        $this->_redirectBack();
    }

    public function setProcessAction()
    {
        $job = Doctrine_Core::getTable('ECB_Model_Job')->findOneBy('jobId', $this->_request->getParam('job'));
        $job->jobProcessId = $this->_request->getParam('process');
        $job->save();
        $this->_redirectBack();
    }

    public function searchAction()
    {
        $this->_disableLayout();

        $jobTable = new ECB_Model_JobTable();
        $jobTable->getJobs();

        if ($this->_request->getParam('keyword')) {
            $jobTable->searchJobs($this->_request->getParam('keyword'));
        }

        if ($this->_request->getParam('status')) {
            $jobTable->filterStatus($this->_request->getParam('status'));
        }

        if ($this->_request->getParam('process')) {
            $jobTable->filterProcess($this->_request->getParam('process'));
        }

        $jobTable->orderJobs('dateModified DESC');
        $jobs = $jobTable->getQuery();

        $statuses = Doctrine_Core::getTable('ECB_Model_JobStatus')->findAll();
        $processes = Doctrine_Core::getTable('ECB_Model_JobProcess')->findAll();

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
            $jobPart = Doctrine_Core::getTable('ECB_Model_JobPart')->create(
                    array_merge($jobPartForm->getValues(), array(
                            'dateCreated' => $zfDate->get(Zend_Date::ISO_8601))
                    ));
            $jobPart->save();
            $this->_flash('Part Added');
        }

        $job = Doctrine_Core::getTable('ECB_Model_Job')->findOneBy('jobId', $this->_request->getParam('jobId'));

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

        $jobPart = Doctrine_Core::getTable('ECB_Model_JobPart')->findBy('jobPartId', $this->_request->getParam('part'));
        $jobPart->delete();

        $job = Doctrine_Core::getTable('ECB_Model_Job')->findOneBy('jobId', $this->_request->getParam('job'));

        $this->view->job = $job;
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
            $jobNote = Doctrine_Core::getTable('ECB_Model_JobNote')->create(
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

        $job = Doctrine_Core::getTable('ECB_Model_Job')->findOneBy('jobId', $this->_request->getParam('jobId'));

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
     * Update the record for the JobCsrd
     */
    public function updateCardAction()
    {
        $this->_disableLayout();
        $return = array();

        $jobCardForm = new Job_Form_JobCard(array('job' => $this->_request->getParam('jobId')));

        if ($this->_request->isPost() && $jobCardForm->isValid($this->_request->getPost())) {
            $zfDate = new Zend_Date();

            $jobCard = Doctrine_Core::getTable('ECB_Model_JobCard')->findOneBy('jobId', $jobCardForm->getValue('jobId'));

            if (!$jobCard) {
                $jobCard = Doctrine_Core::getTable('ECB_Model_JobCard')->create(
                    array(
                            'jobId' => $jobCardForm->getValue('jobId'),
                            'dateCreated' => $zfDate->get(Zend_Date::ISO_8601)
                    )
                );
            }

            $jobCard->setArray($jobCardForm->getValues());

            $jobCard->save();

            $return['flash'] = 'Job Card Updated';
        }

        echo json_encode($return);

        exit;
    }

    protected function numberplateformat($numberPlate)
    {
        if (!strstr($numberPlate, " ")) {
            return chunk_split(strtoupper($numberPlate), 4, ' ');
        }
        return $numberPlate;
    }

}