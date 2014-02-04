<?php
class User_RegistrationController extends Coda_Controller
{
    public function indexAction()
    {
        $zfDate = new Zend_Date();
        $form = new User_Form_Registration();

        if ($this->_request->isPost() && $form->isValid($this->_getAllParams())) {
            //process form

            $user = Doctrine_Core::getTable('ECB_Model_User')->create(array(
                    'username'    => $form->getValue('username'),
                    'name'        => $form->getValue('name'),
                    'email'       => $form->getValue('email'),
                    'password'    => md5($form->getValue('password')),
                    'dateCreated' => $zfDate->get(Zend_Date::ISO_8601)
            ));
            if ($user->isValid()) {
                $user->save();
                $this->gotoRoute(array('controller' => 'index', 'action' => 'index'));
            }
        }

        $this->view->title = "Registration";
        $this->view->form = $form;
    }
}