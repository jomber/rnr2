<?php
namespace User\Model;

class User
{
    
	protected $id;
	protected $username;
	protected $first_name;
	protected $role_id;
	protected $language_id;
	protected $state_id;
	protected $question_id;
	protected $last_name;
	protected $email;
	protected $password;
	protected $answer;
	protected $picture;
	protected $registration_date;
	protected $registration_token;
	protected $email_confirmed;
	
	
	public function exchangeArray($data)
	{
		$this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->username = (isset($data['username'])) ? $data['username'] : null;
        $this->first_name = (isset($data['first_name'])) ? $data['first_name'] : null;
        $this->role_id = (isset($data['role_id'])) ? $data['role_id'] : null;
        $this->language_id = (isset($data['language_id'])) ? $data['language_id'] : null;
        $this->state_id = (isset($data['state_id'])) ? $data['state_id'] : null;
        $this->question_id = (isset($data['question_id'])) ? $data['question_id'] : null;
        $this->last_name = (isset($data['last_name'])) ? $data['last_name'] : null;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->password = (isset($data['password'])) ? $data['password'] : null;
        $this->answer = (isset($data['answer'])) ? $data['answer'] : null;
        $this->picture = (isset($data['picture'])) ? $data['picture'] : null;
        $this->registration_date = (isset($data['registration_date'])) ? $data['registration_date'] : null;
        $this->registration_token = (isset($data['registration_token'])) ? $data['registration_token'] : null;
        $this->email_confirmed = (isset($data['email_confirmed'])) ? $data['email_confirmed'] : null;
	}


	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
	public function getUsername() {
		return $this->username;
	}
	
	public function setUsername($username) {
		$this->username = $username;
		return $this;
	}
    
	public function getFirstName() {
		return $this->first_name;
	}
	
	public function setFirstName($first_name) {
		$this->first_name = $first_name;
		return $this;
	}
	
	public function getRoleId() {
		return $this->role_id;
	}
	
	public function setRoleId($role_id) {
		$this->role_id = $role_id;
		return $this;
	}
	
	public function getLanguageId() {
		return $this->language_id;
	}
	
	public function setLanguageId($language_id) {
		$this->language_id= $language_id;
		return $this;
	}
	
	public function getStateId() {
		return $this->state_id;
	}
	
	public function setStateId($state_id) {
		$this->state_id = $state_id;
		return $this;
	}
	
	public function getQuestionId() {
		return $this->question_id;
	}
	
	public function setQuestionId($question_id) {
		$this->question_id = $question_id;
		return $this;
	}
	
	public function getLastName() {
		return $this->last_name;
	}
	
	public function setLastName($last_name) {
		$this->last_name = $last_name;
		return $this;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
	public function setPassword($password) {
		$this->password = $password;
		return $this;
	}
	
	public function getAnswer() {
		return $this->answer;
	}
	
	public function setAnswer($answer) {
		$this->answer = $answer;
		return $this;
	}
	
	public function getPicture() {
		return $this->picture;
	}
	
	public function setPicture($picture) {
		$this->picture = $picture;
		return $this;
	}
	
	public function getRegistrationDate() {
		return $this->registration_date;
	}
	
	public function setRegistrationDate($registration_date) {
		$this->registration_date = $registration_date;
		return $this;
	}
	
	public function getRegistrationToken() {
		return $this->registration_token;
	}
	
	public function setRegistrationToken($id) {
		$this->registration_token = $registration_token;
		return $this;
	}
	
	public function getEmailConfirmed() {
		return $this->email_confirmed;
	}
	
	public function setEmailConfirmed($email_confirmed) {
		$this->email_confirmed = $email_confirmed;
		return $this;
	}

}