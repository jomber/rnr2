<?php
namespace Review\Model;

class Review
{
    protected $id;
    protected $itemid;
    protected $categoryid;
    protected $reviewedby;
    protected $comments;
    protected $rating;
    protected $reviewdate;
    protected $photo;
    protected $publish;
    protected $first_name;//this field is retrieved from User Table
    

    public function exchangeArray($data)
    {
    	$this->id     = (isset($data['id'])) ? $data['id'] : null;
    	$this->itemid = (isset($data['itemid'])) ? $data['itemid'] : null;
    	$this->categoryid = (isset($data['categoryid'])) ? $data['categoryid'] : null;
    	$this->reviewedby = (isset($data['reviewedby'])) ? $data['reviewedby'] : null;
    	$this->comments   = (isset($data['comments'])) ? $data['comments'] : null;
    	$this->rating     = (isset($data['rating'])) ? $data['rating'] : null;
    	$this->reviewdate     = (isset($data['reviewdate'])) ? $data['reviewdate'] : null;
    	$this->photo     = (isset($data['photo'])) ? $data['photo'] : null;
    	$this->publish     = (isset($data['publish'])) ? $data['publish'] : null;
    	$this->first_name     = (isset($data['first_name'])) ? $data['first_name'] : null;
    }
    
/*    public function __construct(array $options = null) {
    	if (is_array($options)) {
    		$this->setOptions($options);
    	}
    }
    
    public function __set($name, $value) {
    	$method = 'set' . $name;
    	if (!method_exists($this, $method)) {
    		throw new Exception('Invalid Method');
    	}
    	$this->$method($value);
    }
    
    public function __get($name) {
    	$method = 'get' . $name;
    	if (!method_exists($this, $method)) {
    		throw new Exception('Invalid Method');
    	}
    	return $this->$method();
    }
    
    public function setOptions(array $options) {
    	$methods = get_class_methods($this);
    	foreach ($options as $key => $value) {
    		$method = 'set' . ucfirst($key);
    		if (in_array($method, $methods)) {
    			$this->$method($value);
    		}
    	}
    	return $this;
    }
    */
    
    public function getId() {
    	return $this->id;
    }
    
    public function setId($id) {
    	$this->id = $id;
    	return $this;
    }
    
    public function getItemId() {
    	return $this->itemid;
    }
    
    public function setItemId($itemid) {
    	$this->itemid = $itemid;
    	return $this;
    }
    
    public function getCategoryId() {
    	return $this->categoryid;
    }
    
    public function setCategoryId($categoryid) {
    	$this->categoryid = $categoryid;
    	return $this;
    }
    
    public function getReviewedBy() {
    	return $this->reviewedby;
    }
    
    public function setReviewedBy($reviewedby) {
    	$this->reviewedby = $reviewedby;
    	return $this;
    }
    
    public function getComments() {
    	return $this->comments;
    }
    
    public function setComments($comments) {
    	$this->comments = $comments;
    	return $this;
    }
    
    public function getRating() {
    	return $this->rating;
    }
    
    public function setRating($rating) {
    	$this->rating = $rating;
    	return $this;
    }
    
    public function getReviewDate() {
    	return $this->reviewdate;
    }
    
    public function setReviewDate($reviewdate) {
    	$this->reviewdate = $reviewdate;
    	return $this;
    }
    
    public function getPhoto() {
    	return $this->photo;
    }
    
    public function setPhoto($photo) {
    	$this->photo = $photo;
    	return $this;
    }
    
    public function getPublish() {
    	return $this->publish;
    }
    
    public function setPublish($publish) {
    	$this->publish = $publish;
    	return $this;
    }
    
    public function getFirstName() {
    	return $this->first_name;
    }
    
    public function setFirstName($first_name) {
    	$this->first_name = $first_name;
    	return $this->first_name;
    }
}