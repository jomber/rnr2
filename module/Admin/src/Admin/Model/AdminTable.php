<?php
namespace Admin\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;

class AdminTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getAdmin($id)
    {
        $id  = (int) $id;
        $resultSet = $this->tableGateway->select(array('id' => $id));
        return $resultSet;
    }
    
    public function isAdminAdmin($id)
    {
    	$id  = (int) $id;
    	$where = new Where();
    	$where->like('role_id', 3);
    	$where->like('id', $id);
    	
    	$resultSet = $this->tableGateway->select($where);
    	//empty if the user is not an admin "3"
    	return $resultSet;
    }

}