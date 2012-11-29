<?php

require_once ('library/XML.php');
require_once ('library/REST.php');

class User {

	public function login_success($userVOs) {
		REST::header($_SERVER['HTTP_ACCEPT'], 200, json_encode($userVOs));
	}
	
	public function login_failure() {
		echo file_get_contents("view/templates/index.php");
	}
	
	public function user_success($userVO) {
		REST::header($_SERVER['HTTP_ACCEPT'], 200, json_encode($userVO));
	}
	
	public function user_failure() {
		REST::header('', 204);
	}

}

?>