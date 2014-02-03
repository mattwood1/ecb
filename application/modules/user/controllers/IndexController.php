<?php
class User_IndexController extends Coda_Controller
{
    public function indexAction()
    {
        $users = Doctrine_Core::getTable('ECB_Model_User')->findAll();

        $this->view->title = "User Administration";
        $this->view->users = $users;
    }
}