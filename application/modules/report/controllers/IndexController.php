<?php
class Report_IndexController extends Coda_Controller
{
    public function indexAction()
    {
        /* Initialize action controller here */
        if (! $this->_request->user) {
            $requestUrl = new Zend_Session_Namespace('requestUrl');
            $requestUrl->url = $this->_request->getRequestUri();

            $this->_flash('Reports requires the user to be logged in', Coda_Helper_Flash::INFO);
            $this->gotoRoute(array('module' => 'user', 'controller' => 'auth', 'action' => 'login'));
        }
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

    public function reportPdfAction()
        {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout->disableLayout(true);

            $printLayout = new Zend_Layout();
			$printLayout->setLayoutPath( APPLICATION_PATH . '/layouts/scripts' );
			$printLayout->setLayout('print-bootstrap');

            $job = Doctrine_Core::getTable('Coda_Model_Job')->findOneBy('jobId', $this->_request->getParam('jobId'));
            $this->view->job = $job;

            if ( $job ) {
                $printLayout->content .= $this->view->render('index/report-1.phtml');
            } else {
                $this->gotoRoute(array('action' => 'index'));
            }

            $pdfGen = new Coda_Pdf( APPLICATION_PATH . '/bin/wkhtmltopdf' );
            $pdfGen->setBody( $printLayout->render() );

            $this->getResponse()
                ->setHeader( 'Content-type', 'application/pdf' )
                ->appendBody( $pdfGen->generate() );

        }
}