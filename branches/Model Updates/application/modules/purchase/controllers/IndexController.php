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
            // Create the purchase record
            
            // redirect
        }
        
        $this->view->form = $form;
    }

}