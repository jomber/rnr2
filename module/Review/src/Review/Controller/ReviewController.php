<?php
namespace Review\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\View\Model\ViewModel;
use Review\Form\ReviewForm;
use Review\Model\Review;

class ReviewController extends AbstractActionController
{
	protected $reviewTable;
	
	public function indexAction()
    {
    	return new ViewModel(array(
    			'reviews' => $this->getReviewTable()->fetchAll(),
    	));
    }
    
    public function addAction()
    {
    	$form = new ReviewForm();
    	$form->get('submit');
    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		$review = new Review();
    		$form->setInputFilter($review->getInputFilter());
    		$form->setData($request->getPost());
    	
    		if ($form->isValid()) {
    			$review->exchangeArray($form->getData());
    			$this->getReviewTable()->saveReview($review);
    			
    			$itemId = $form->get('itemid')->getValue();
    			$categoryId =  $form->get('categoryid')->getValue();
    			$category = $this->retrieveCategory($categoryId);

    			return $this->redirect()->toRoute($category, array(
    					'action' =>  'item',
    					'id' =>$itemId,
    			));
    			
    		}
    	}
    	return array('form' => $form);
    }

    public function editAction()
    {
    	
    }

    public function deleteAction()
    {
    }
    
    public function getReviewTable()
    {
    	if (!$this->reviewTable) {
    		$sm = $this->getServiceLocator();
    		$this->reviewTable = $sm->get('Review\Model\ReviewTable');
    	}
    	return $this->reviewTable;
    }
    
    private function retrieveCategory($category){
    	
    	$categoryString = "";
    	switch ($category) {
    		case 1:
    			$categoryString = "restaurant";
    			return $categoryString;
    		case 2:
    			$categoryString = "hotel";
    			return $categoryString;
    		case 3:
    			$categoryString = "park";
    			return $categoryString;
    		case 4:
    			$categoryString = "librarie";
    			return $categoryString;
    		case 5:
    			$categoryString = "cinema";
    			return $categoryString;
    		case 6:
    			$categoryString = "stadium";
    			return $categoryString;
    		default:
    			return "";
    	}
    }
    
}