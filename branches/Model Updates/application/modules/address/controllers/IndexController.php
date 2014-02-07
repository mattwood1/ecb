<?php
class Address_IndexController extends Coda_Controller
{
    public function indexAction()
    {
        $form = new Address_Form_Address();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $address = Doctrine_Core::getTable('ECB_Model_Address')->create($form->getValues());
            $address->save();
            $form->reset();
        }

        $addresses = Doctrine_Core::getTable('ECB_Model_Address')->findAll();

        $this->view->form = $form;
        $this->view->addresses = $addresses;



    }
    public function addAction()
    {
            $form = new Address_Form_Address();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $address = Doctrine_Core::getTable('ECB_Model_Address')->create($form->getValues());
            $address->save();
            $form->reset();
            $this->gotoRoute(array('action' => 'index', 'address' => null));
        }

        $addresses = Doctrine_Core::getTable('ECB_Model_Address')->findAll();

        $this->view->form = $form;
        $this->view->addresses = $addresses;
    }

    public function editAction()
    {
        $form = new Address_Form_Address();
        $address = Doctrine_Core::getTable('ECB_Model_Address')->findOneBy('addressId', $this->_request->getParam('addressId'));

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $address->fromArray($form->getValues());
            $address->save();
            $this->gotoRoute(array('action' => 'index', 'addressId' => null));
        }

        $form->populate($address->toArray());

        $this->view->form = $form;
    }

    public function deleteAction()
    {
        $address = Doctrine_Core::getTable('ECB_Model_Address')->findOneBy('addressId', $this->_request->getParam('addressId'));
        $address->delete();
        $this->gotoRoute(array('action' => 'index', 'addressId' => null));
    }

}