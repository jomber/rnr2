<?php
namespace Review\Model;

use Zend\InputFilter\Factory as InputFactory;     
use Zend\InputFilter\InputFilter;                 
use Zend\InputFilter\InputFilterAwareInterface;   
use Zend\InputFilter\InputFilterInterface;       

class Review implements InputFilterAwareInterface
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
    protected $average;
    protected $first_name;//this field is retrieved from User Table
    
    protected $inputFilter;

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
    	$this->average     = (isset($data['average'])) ? $data['average'] : null;
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
    	throw new \Exception("Not used");
    }
    
    public function getInputFilter()
    {
    	if (!$this->inputFilter) {
    		$inputFilter = new InputFilter();
    		$factory     = new InputFactory();
    
    		$inputFilter->add($factory->createInput(array(
    				'name'     => 'id',
    				'required' => true,
    				'filters'  => array(
    						array('name' => 'Int'),
    				),
    		)));
    
    		$inputFilter->add($factory->createInput(array(
    				'name'     => 'itemid',
    				'required' => true,
    				'filters'  => array(
    						array('name' => 'Int'),
    				),
    		)));
    		
    		$inputFilter->add($factory->createInput(array(
    				'name'     => 'categoryid',
    				'required' => true,
    				'filters'  => array(
    						array('name' => 'Int'),
    				),
    		)));
    		
    		$inputFilter->add($factory->createInput(array(
    				'name'     => 'reviewedby',
    				'required' => true,
    				'filters'  => array(
    						array('name' => 'Int'),
    				),
    		)));
    		
    		$inputFilter->add($factory->createInput(array(
    				'name'     => 'rating',
    				'required' => true,
    				'filters'  => array(
    						array('name' => 'Int'),
    				),
    		)));
    		
    		$inputFilter->add($factory->createInput(array(
    				'name'     => 'comments',
    				'required' => true,
    				'filters'  => array(
    						array('name' => 'StripTags'),
    						array('name' => 'StringTrim'),
    				),
    				'validators' => array(
    						array(
    								'name'    => 'StringLength',
    								'options' => array(
    										'encoding' => 'UTF-8',
    										'min'      => 1,
    										'max'      => 500,
    								),
    						),
    				),
    		)));
    
    		
    		    
    		$this->inputFilter = $inputFilter;
    	}
    
    	return $this->inputFilter;
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
    
    public function getAverage() {
    	return $this->average;
    }
    
    public function setAverage($average) {
    	$this->average = $average;
    	return $this->average;
    }
}