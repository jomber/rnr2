<?php
namespace Stadium\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;

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






    public function getReviews()
    {
        $select = new \Zend\Db\Sql\Select ;
        $select->from('review');
        $select->columns(array('*'));
        $select->join('user', "user.id = review.reviewedby", array('*'), 'left');
         
        echo $select->getSqlString();
        $resultSet = $this->tableGateway->selectWith($select);
       
        return $resultSet; 
    }


 /*   public function getReviews()
    {
       $dbAdapter = new Zend\Db\Adapter\Adapter(array(
        'driver' => 'Mysqli',
        'database' => 'rnr2db',
        'username' => 'root',
        'password' => 'root'
        ));

       $select = new Select();
       $select->from('review')
       ->columns(array('review.*', 'u_name' => 'user.username'))
       ->join('user', 'review.reviewedby = user.id');

       $statement = $dbAdapter->createStatement();
       $select->prepareStatement($dbAdapter, $statement);
       $driverResult = $statment->execute();

       $resultset = new ResultSet();
$resultset->initialize($driverResult); // can use setDataSource() for older ZF2 versions.

//foreach ($resultset as $row) {
        // $row is an ArrayObject

return $resultset;
}
*/










/*
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