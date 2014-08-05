<?php
namespace Query\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;

class QueryTable
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

    public function getQuery($id)
    {
        $id  = (int) $id;
        $resultSet = $this->tableGateway->select(array('id' => $id));
        return $resultSet;
    }

    public function saveQuery(Query $query)
    {
        $data = array(
            'name' => $query->name,
            'email'  => $query->email,
            'comments'  => $query->comments,
        );

        $id = (int)$query->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getQuery($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

}