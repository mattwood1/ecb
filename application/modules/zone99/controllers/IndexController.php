<?php
class Zone99_IndexController extends Coda_Controller
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
/*
        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {

            $upload = new Zend_File_Transfer();
            $upload->setDestination(APPLICATION_PATH . '/../public/uploads/zone99');
            $upload->receive();
            $name = stristr($upload->getFileName(), '/uploads/zone99');
            $zone99 = Doctrine_Core::getTable('Coda_Model_Zone99')->create(
                    array_merge(
                            $form->getValues(),
                            array( 'image' => $name )
                    ));
            $zone99->save();
        }
*/


        $zone99s = Doctrine_Core::getTable('Coda_Model_Zone99')->findAll();
        $this->view->zone99s = $zone99s;



    }
    public function addAction()
    {
          $form = new Zone99_Form_Zone99();

           if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {

            $upload = new Zend_File_Transfer();
            $upload->setDestination(APPLICATION_PATH . '/../public/uploads/zone99');
            $upload->receive();
            $name = stristr($upload->getFileName(), '/uploads/zone99');
            $zone99 = Doctrine_Core::getTable('Coda_Model_Zone99')->create(
                    array_merge(
                            $form->getValues(),
                            array( 'image' => $name )
                    ));
            $zone99->save();
            $this->gotoRoute(array('action' => 'index', 'z99Id' => null));
        }
        $this->view->form = $form;
    }

    public function editAction()
    {
        $form = new Zone99_Form_Zone99 ();
        $zone99 = Doctrine_Core::getTable('Coda_Model_Zone99')->findOneBy('z99Id', $this->_request->getParam('z99Id'));

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $upload = new Zend_File_Transfer();
            $upload->setDestination(APPLICATION_PATH . '/../public/uploads/zone99');
            if ($upload->receive()) {
                $name = stristr($upload->getFileName(), '/uploads/zone99');
                $data = array_merge($form->getValues(), array( 'image' => $name ));
            } else {
                $data = $form->getValues();
            }

            $zone99->fromArray($data);
            $zone99->save();
            $this->gotoRoute(array('action' => 'index', 'z99Id' => null));
        }
        $form->populate($zone99->toArray());

        $this->view->form = $form;
    }

    public function deleteAction()
    {
        $zone99 = Doctrine_Core::getTable('Coda_Model_Zone99')->findOneBy('z99Id', $this->_request->getParam('z99Id'));
        $zone99->delete();
        $this->gotoRoute(array('action' => 'index', 'z99Id' => null));
    }

}