<?php
namespace Feedback\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;

class FeedbackTable
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

    public function getFeedback($id)
    {
/*        $id  = (int) $id;
        $resultSet = $this->tableGateway->select(array('id' => $id));
        return $resultSet;
*/


        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveFeedback(Feedback $feedback)
    {
        $data = array(
            'name' => $feedback->name,
            'email'  => $feedback->email,
            'comments'  => $feedback->comments,
        );

        $id = (int)$feedback->getId();
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getFeedback($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

        public function deleteFeedback($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }

}