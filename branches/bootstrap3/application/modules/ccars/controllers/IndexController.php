<?php
class Ccars_IndexController extends Coda_Controller
{

    public function init()
    {
        /* Initialize action controller here */
        if (! $this->_request->user) {
            $requestUrl = new Zend_Session_Namespace('requestUrl');
            $requestUrl->url = $this->_request->getRequestUri();

            $this->_flash('Reports requires the user to be logged in', Coda_Helper_Flash::INFO);
            $this->gotoRoute(array('module' => 'user', 'controller' => 'auth', 'action' => 'login'));
        }
    }

    public function indexAction()
    {
        $form = new Ccars_Form_Ccars();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $ccars = Doctrine_Core::getTable('Coda_Model_Ccars')->create($form->getValues());
            $ccars->save();
            $form->reset();
        }

        $ccarsa = Doctrine_Core::getTable('Coda_Model_Ccars')->findAll();

        $this->view->form = $form;
    $this->view->ccarsa = $ccarsa;

        }

     public function addAction()
    {
            $form = new Ccars_Form_Ccars();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $address = Doctrine_Core::getTable('Coda_Model_Ccars')->create($form->getValues());
            $address->save();
            $form->reset();
            $this->gotoRoute(array('action' => 'index', 'Ccars' => null));
        }

        $ccarsa = Doctrine_Core::getTable('Coda_Model_Ccars')->findAll();

        $this->view->form = $form;
        $this->view->ccarsa = $ccarsa;
    }


    public function editAction()
    {
        $form = new diary_Form_Diary ();
        $diary = Doctrine_Core::getTable('Coda_Model_Diary')->findOneBy('diaryId', $this->_request->getParam('diaryId'));

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $zone99->fromArray(array_merge(
                            $form->getValues(),
                            array( 'image' => $name )));
            $zone99->save();
            $this->gotoRoute(array('action' => 'index', 'z99Id' => null));
        }

        $form->populate($zone99->toArray());

        $this->view->form = $form;
    }




    public function deleteAction()
    {
        $ccars = Doctrine_Core::getTable('Coda_Model_Ccars')->findOneBy('carId', $this->_request->getParam('carId'));
        $ccars->delete();
        $this->gotoRoute(array('action' => 'index', 'carId' => null));
    }

}
?>