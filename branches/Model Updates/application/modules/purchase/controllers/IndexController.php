<?php class Purchase_IndexController extends Coda_Controller
{
    public function indexAction()
    {
        // List recent purchases
        
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
            $this->gotoRoute(array('action' => 'index'));
        }
        
        $this->view->form = $form;
    }

}