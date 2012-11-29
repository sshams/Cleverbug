<?php

class Session {
	
	public static function start() {
		if(!isset($_SESSION)) {
			session_start();
		}
	}
	
	public static function regenerate() {
		if (!isset($_SESSION)) {
  			session_start();
		}
		if (PHP_VERSION >= 5.1) {
			session_regenerate_id(true);
		} else {
			session_regenerate_id();
		}
	}
	
	public static function destroy() {
		if(!isset($_SESSION)) {
			session_start();
		}
		$_SESSION = array();
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
					$params["path"], $params["domain"],
					$params["secure"], $params["httponly"]
			);
		}
		session_destroy();
	}
}

?>