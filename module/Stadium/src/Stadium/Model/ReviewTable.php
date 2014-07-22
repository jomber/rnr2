<?php
namespace Stadium\Model;

use Zend\Db\TableGateway\TableGateway;

class ReviewTable
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
/*
    public function getReview($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveReview(Review $review)
    {
        $data = array(
            'comments' => $review->comments,
 //           'address'  => $stadium->address,
 //           'info'  => $stadium->info,
        );

        $id = (int)$review->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getReview($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteReview($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
*/    
}