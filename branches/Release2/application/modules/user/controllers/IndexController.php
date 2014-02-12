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
        //$form =
    }

    public function deleteAction()
    {

    }
}