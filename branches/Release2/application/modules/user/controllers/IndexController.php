<?php
class User_IndexController extends Coda_Controller
{
    public function indexAction()
    {
        $users = ECB_Model_UserTable::getInstance()->findAll();

        $this->view->title = "User Administration";
        $this->view->users = $users;
    }

    public function editAction()
    {
        $form = new User_Form_User();

        $user = ECB_Model_UserTable::getInstance()->findOneBy('userId', $this->_request->getParam('id'));

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $user->fromArray($form->getValues());
            $user->save();
            $this->_flash('User has been updated.', Coda_Helper_Flash::SUCCESS);
            $this->gotoRoute(array('action' => 'index'));
        }

        $form->populate($user->toArray());

        $this->view->form = $form;
    }

    public function deleteAction()
    {

    }
}