<?php
namespace Feedback\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\View\Model\ViewModel;
use Feedback\Form\FeedbackForm;
use Feedback\Model\Feedback;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;



class FeedbackController extends AbstractActionController
{
	protected $feedbackTable;
	
	public function indexAction()
    {
    	return new ViewModel(array(
    			'feedbacks' => $this->getFeedbackTable()->fetchAll(),
    	));
    }
    
    public function addAction()
    {
        $form = new FeedbackForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $feedback = new Feedback();
            $form->setInputFilter($feedback->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $feedback->exchangeArray($form->getData());
                $this->getFeedbackTable()->saveFeedback($feedback);

                return $this->redirect()->toRoute('feedback');
            }
        }
        return array('form' => $form);
    }



    public function editAction()
    {
    	
    }


    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('feedback');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getFeedbackTable()->deleteFeedback($id);
            }

            // Redirect to list of feedbacks
            return $this->redirect()->toRoute('feedback');
        }

        return array(
            'id'    => $id,
            'feedback' => $this->getFeedbackTable()->getFeedback($id)
        );
    }




    
    public function getFeedbackTable()
    {
    	if (!$this->feedbackTable) {
    		$sm = $this->getServiceLocator();
    		$this->feedbackTable = $sm->get('Feedback\Model\FeedbackTable');
    	}
    	return $this->feedbackTable;
    }
    
    
    
}