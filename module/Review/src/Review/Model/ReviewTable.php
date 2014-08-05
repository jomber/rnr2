<?php
namespace Review\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;


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
		$resultSet = $this->tableGateway->select(array('id' => $id));
		return $resultSet;
	}
	
	/*public function getReviewByCategoryIdem($categoryId, $item)
	{
		$categoryId  = (int) $categoryId;
		$item  = (int) $item;
		
		$where = new Where();
		$where->like('categoryid', $categoryId);
		$where->like('itemid', $item);
		
		$resultSet = $this->tableGateway->select($where);
		
		return $resultSet;
	}*/
	
	public function getReviewByCategoryIdem($categoryId, $item)
	 {
		$categoryId  = (int) $categoryId;
		$item  = (int) $item;
		
		$select = new Select() ;
		$select->from('review');
		$select->columns(array('id','rating','comments','reviewdate'));
		$select->join('user', "user.id = review.reviewedby", array('first_name'), 'left');
		$select->where(array('categoryid' => $categoryId,'itemid'=> $item));
				
		$resultSet = $this->tableGateway->selectWith($select);
		
		return $resultSet;
	}
	
	
	public function saveReview(Review $review)
	{
		$data = array(
				'itemid' => $review->getItemId(),
				'categoryid' => $review->getCategoryId(),
				'reviewedby' => $review->getReviewedBy(),
				'comments' => $review->getComments(),
				'rating' => $review->getRating(),
				'reviewdate' => $review->getReviewDate(),
				'photo' => $review->getPhoto(),
				'publish' => $review->getPublish(),
		);
	
		$id = (int)$review->getId();
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
	
	/*protected $table = 'review';
	
	public function __construct(Adapter $adapter) {
		$this->adapter = $adapter;
	}
	
	public function fetchAll() {
		$resultSet = $this->select(function (Select $select) {
			$select->order('created ASC');
		});
		$entities = array();
		foreach ($resultSet as $row) {
			$entity = new Review();
			$entity->setId($row->id)
			->setItemId($row->itemid)
			->setCategoryId($row->categoryid)
			->setReviewedBy($row->reviewedby)
			->setComments($row->comments)
			->setRating($row->rating)
			->setReviewDate($row->reviewdate)
			->setPhoto($row->photo)
			->setPublish($row->publish);
			
			$entities[] = $entity;
		}
		return $entities;
	}
	
	
	public function getReview($id) {
		$row = $this->select(array('id' => (int) $id))->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
	
		$review = new Review(array(
				'id' => $row->id,
				'itemid' => $row->itemid,
				'categoryid' => $row->categoryid,
				'reviewedby' => $row->reviewedby,
				'comments' => $row->comments,
				'rating' => $row->rating,
				'reviewdate' => $row->reviewdate,
				'photo' => $row->photo,
				'publish' => $row->publish,	
		));
		return $review;
	}
	
	
	public function saveReview(Review $review) {
		$data = array(
				'itemid' => $review->getItemId(),
				'categoryid' => $review->getCategoryId(),
				'reviewedby' => $review->getReviewedBy(),
				'comments' => $review->getComments(),
				'rating' => $review->getRating(),
				'reviewdate' => $review->getReviewDate(),
				'photo' => $review->getPhoto(),
				'publish' => $review->getPublish(),
		);
	
		$id = (int) $review->getId();
	
		if ($id == 0) {
			$data['reviewdate'] = date("Y-m-d H:i:s");
			if (!$this->insert($data)){
				return false;
			}
				
			return $this->getLastInsertValue();
		}
		elseif ($this->getReview($id)) {
			if (!$this->update($data, array('id' => $id))){
				return false;
			}	
			return $id;
		}
		else
			return false;
	}
	
	public function removeReview($id) {
		return $this->delete(array('id' => (int) $id));
	}
	*/

       

}