<?php
namespace Stadium\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\View\Model\ViewModel;
use Stadium\Model\Stadium;
use Stadium\Form\StadiumForm;
use Review\Model\Review;
use Review\Form\ReviewForm;
use Review\Controller;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;


class StadiumController extends AbstractActionController
{
    protected $stadiumTable;
    protected $reviewTable;
    protected $userTable;

    public function indexAction()
    {
    	$numItems = $this->getStadiumTable()->fetchAll()->count();

    	$numReviewArray;
    	$averageReviewsArray;
    	
    	for($i = 1; $i <= $numItems; $i++){
    		$numReviewArray[] = $this->getReviewTable()->getNumberReviewByCategoryIdem(6, $i);
    		$average = $this->getReviewTable()->getAverageReviewByCategoryIdem(6, $i);
    		$currentAverage = $average->current()->getAverage();
    		$averageReviewsArray[] = $this->averageThumbs($currentAverage);
    	}

        return new ViewModel(array(
            'stadiums' => $this->getStadiumTable()->fetchAll(),
        	'reviewsNumberArray' => $numReviewArray,
        	'reviewsCount' => 0,
        	'averageReviewsArray' => $averageReviewsArray,
        ));
    }
    
    public function addAction()
    {
        $form = new StadiumForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $stadium = new Stadium();
            $form->setInputFilter($stadium->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $stadium->exchangeArray($form->getData());
                $this->getStadiumTable()->saveStadium($stadium);

                // Redirect to list of Stadiums
                return $this->redirect()->toRoute('stadium');
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('stadium', array(
                'action' => 'add'
            ));
        }

        // Get the Stadium with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $stadium = $this->getStadiumTable()->getStadium($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('stadium', array(
                'action' => 'index'
            ));
        }

        $form  = new StadiumForm();
        $form->bind($stadium);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($stadium->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getStadiumTable()->saveStadium($form->getData());

                // Redirect to list of Stadiums
                return $this->redirect()->toRoute('stadium');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('stadium');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getStadiumTable()->deleteStadium($id);
            }

            // Redirect to list of Stadiums
            return $this->redirect()->toRoute('stadium');
        }

        return array(
            'id'    => $id,
            'stadium' => $this->getStadiumTable()->getStadium($id)
        );
    }

    public function getStadiumTable()
    {
        if (!$this->stadiumTable) {
            $sm = $this->getServiceLocator();
            $this->stadiumTable = $sm->get('Stadium\Model\StadiumTable');
        }
        return $this->stadiumTable;
    }

    public function getReviewTable()
    {
        if (!$this->reviewTable) {
            $sm = $this->getServiceLocator();
            $this->reviewTable = $sm->get('Review\Model\ReviewTable');
        }
        return $this->reviewTable;
    }


   public function getUserTable()
    {
        if (!$this->userTable) {
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('User\Model\UserTable');
        }
        return $this->userTable;
    }


    public function itemAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $categoryid = 6;
        $form = $this->forward()->dispatch('Review/Controller/Review', array(
        		'action' => 'add'
        ));
        
        return new ViewModel(array(
            'stadium' => $this->getStadiumTable()->getStadium($id),
        	'reviewsByItem' => $this->getReviewTable()->getReviewByCategoryIdem($categoryid, $id),
        	'form' => $form->form,
        ));
    }

    
    
    //this function should be placed in a utility folder
    /*
     * Create a string path for the average thumbs
     */
    private function averageThumbs($average){
    	 
    	$averageString = "";
    	switch ($average) {
    		case 1:
    			$averageString = "/img/icons/VeryBad.png";
    			return $averageString;
    		case 2:
    			$averageString = "/img/icons/Bad.png";
    			return $averageString;
    		case 3:
    			$averageString = "/img/icons/Satisfactory.png";
    			return $averageString;
    		case 4:
    			$averageString = "/img/icons/Good.png";
    			return $averageString;
    		case 5:
    			$averageString = "/img/icons/VeryGood.png";
    			return $averageString;
    		default:
    			return "";
    	}
    }
}