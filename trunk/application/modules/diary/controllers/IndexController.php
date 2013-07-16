<?php class Diary_IndexController extends Coda_Controller
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Diary_Form_Diary();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $diary = Doctrine_Core::getTable('Coda_Model_Diary')->create($form->getValues());
            $diary->save();
            $form->reset();
        }

        $diarys = Doctrine_Core::getTable('Coda_Model_Diary')->findAll();

        $this->view->form = $form;
        $this->view->diarys = $diarys;

        //var_dump($this->_helper);

        //$this->view->addHelperPath(APPLICATION_PATH . '/../library/Coda/View/Helper/', 'Coda_View_Helper_');

        }

     public function addAction()
    {
            $form = new Diary_Form_Diary();

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $diary = Doctrine_Core::getTable('Coda_Model_Diary')->create($form->getValues());
            $diary->save();
            $form->reset();
            $this->gotoRoute(array('action' => 'index', 'Diary' => null));
        }

        $Diarys = Doctrine_Core::getTable('Coda_Model_Diary')->findAll();

        $this->view->form = $form;
        $this->view->diarys = $Diarys;
    }


   public function editAction()
    {
        $form = new Diary_Form_Diary();
        $diary = Doctrine_Core::getTable('Coda_Model_Diary')->findOneBy('diaryId', $this->_request->getParam('diaryId'));

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $diary->fromArray($form->getValues());
            $diary->save();
            $this->gotoRoute(array('action' => 'index', 'diaryId' => null));
        }

        $form->populate($diary->toArray());

        $this->view->form = $form;
    }




    public function deleteAction()
    {
        $diary = Doctrine_Core::getTable('Coda_Model_Diary')->findOneBy('diaryId', $this->_request->getParam('diaryId'));
        $diary->delete();
        $this->gotoRoute(array('action' => 'index', 'diaryId' => null));
    }

}
?>