<?php
namespace Query\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\View\Model\ViewModel;
use Query\Form\QueryForm;
use Query\Model\Query;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;



class QueryController extends AbstractActionController
{
	protected $queryTable;
	
	public function indexAction()
    {
    	return new ViewModel(array(
    			'queries' => $this->getQueryTable()->fetchAll(),
    	));
    }
    
    public function addAction()
    {
        $form = new QueryForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $query = new Query();
            $form->setInputFilter($query->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $query->exchangeArray($form->getData());
                $this->getQueryTable()->saveQuery($query);

                // Redirect to list of Stadiums
                return $this->redirect()->toRoute('query');
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
    
    public function getQueryTable()
    {
    	if (!$this->queryTable) {
    		$sm = $this->getServiceLocator();
    		$this->queryTable = $sm->get('Query\Model\QueryTable');
    	}
    	return $this->queryTable;
    }
    
    
    
}