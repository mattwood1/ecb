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

    public function paidQuotesPdfAction()
        {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout->disableLayout(true);

            $printLayout = new Zend_Layout();
			$printLayout->setLayoutPath( APPLICATION_PATH . '/layouts/scripts' );
			$printLayout->setLayout('print-bootstrap');

            $quoteId = $this->getParam('id');

            if( $quoteId ) {

                //single
                $printLayout->content .= $this->_generateQuotePdf($quoteId);
            }
            else {

                //all
                $paidQuotesQuery = LS_Model_ProposalTable::getPaidQuotes();

                foreach ($paidQuotesQuery->execute() as $quote) {

                     $printLayout->content .= $this->_generateQuotePdf($quote->id);
                }
            }

            $pdfGen = new Xigen_Pdf( APPLICATION_PATH . '/bin/wkhtmltopdf' );
            $pdfGen->setBody( $printLayout->render() );

            $this->getResponse()
                ->setHeader( 'Content-type', 'application/pdf' )
                ->appendBody( $pdfGen->generate() );
        }
}