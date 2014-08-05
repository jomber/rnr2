<?php
namespace Review\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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
    
}