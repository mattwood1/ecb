<?php
class Todo_IndexController extends Coda_Controller
{

    public function init()
    {
        /* Initialize action controller here */
        if (! $this->_request->user) {
            $this->_flash('To Do requires the user to be logged in', Coda_Helper_Flash::INFO);
            $this->gotoRoute(array('module' => 'user', 'controller' => 'auth', 'action' => 'login'));
        }
    }
    public function indexAction()
    {
        // Nothing really unless database driven
        //$todos = Doctrine_Core::getTable('Coda_Model_Todo')->findAll()->order('todoId DESC');

        $todos = Doctrine_Query::create()->select('*')->from('Coda_Model_Todo')->orderBy('todoId ASC');

        $this->view->todos = $todos->execute();
    }

    public function addAction()
    {
        $form = new Todo_Form_Todo();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $zfDate = new Zend_Date();
            $todo = Doctrine_Core::getTable('Coda_Model_Todo')->create(
                    array_merge(
                            $form->getValues(),
                            array(
                                    'dateCreated' => $zfDate->get(Zend_Date::ISO_8601),
                                    'userId' => $this->_request->user->userId
                            )
                    )
            );
            $todo->save();
            $this->_flash('To Do added');
            $this->gotoRoute(array('action' => 'index'));
        }

        $this->view->form = $form;
    }

    public function editAction()
    {
        $form = new Todo_Form_Todo();

        if ($this->_request->getParam('todoId')) {
            $todo = Doctrine_Core::getTable('Coda_Model_Todo')->findOneBy('todoId', $this->_request->getParam('todoId'));

            if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
                $todo->fromArray($form->getValues());
                $todo->save();
                $this->_flash('To Do updated');
                $this->gotoRoute(array('action' => 'index', 'todoId' => null));
            }

            $form->populate($todo->toArray());

            $this->view->form = $form;

        } else {
            $this->gotoRoute(array('action' => 'index'));
        }

    }

    public function deleteAction()
    {
        $todo = Doctrine_Core::getTable('Coda_Model_Todo')->findOneBy('todoId', $this->_request->getParam('todoId'));
        $todo->delete();
        $this->gotoRoute(array('action' => 'index', 'todoId' => null));
    }

}
?>