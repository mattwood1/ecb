<?php class Purchase_IndexController extends Coda_Controller
{
    public function indexAction()
    {
        // List recent purchases
        $purchaseTable = new ECB_Model_PurchaseTable();
        $purchaseQuery = $purchaseTable->getInstance()
                ->createQuery('p')
                ->orderBy('dateCreated ASC');
        
        $this->view->purchase = $purchaseQuery->execute();
        
        // Paginated
    }
    
    public function editAction()
    {
        // Need to have some purchases first
    } 
    
    public function addAction()
    {
        // Need a form for entering purchases
        $form = new Purchase_Form_Purchase();
        
        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $zfDate = new Zend_Date();
            // Create the purchase record
            $purchase = new ECB_Model_Purchase;
            $purchase->fromArray($form->getValues());
            $purchase->dateCreated = $zfDate->get(Zend_Date::ISO_8601);
            $purchase->save();
            
            // redirect to the index
            $this->_flash('Purchase Added');
            $this->gotoRoute(array('action' => 'index'));
        }
        
        $this->view->form = $form;
    }

}