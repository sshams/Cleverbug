<?php

class UserVO {
	
	public $user_id;
	public $username;
	public $dob;
	
	function __construct($user_id, $username, $dob) {
		$this->user_id = $user_id;
		$this->username = $username;
		$this->dob = $dob;
	}
	
	function __toString() {
		return "user_id => " . $this->user_id . ", username => " . $this->username . ", DOB => " . $this->dob;
	}

}

?>