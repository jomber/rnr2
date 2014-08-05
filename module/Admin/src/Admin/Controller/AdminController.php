<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController
{
	protected $adminTable;
	protected $stadiumTable;
	protected $reviewTable;
	protected $userTable;
	
	public function indexAction()
    {
    	return new ViewModel(array(
    			'reviews' => $this->getReviewTable()->fetchAll(),
    	));
    }

    public function queryAction()
    {
        return new ViewModel(array(
                'queries' => $this->getQueryTable()->fetchAll(),
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
    
    public function getAdminTable()
    {
    	if (!$this->adminTable) {
    		$sm = $this->getServiceLocator();
    		$this->adminTable = $sm->get('Admin\Model\AdminTable');
    	}
    	return $this->adminTable;
    }
    
    public function getReviewTable()
    {
    	if (!$this->reviewTable) {
    		$sm = $this->getServiceLocator();
    		$this->reviewTable = $sm->get('Review\Model\ReviewTable');
    	}
    	return $this->reviewTable;
    }

    public function getQueryTable()
    {
        if (!$this->queryTable) {
            $sm = $this->getServiceLocator();
            $this->queryTable = $sm->get('Admin\Model\QueryTable');
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
    
}