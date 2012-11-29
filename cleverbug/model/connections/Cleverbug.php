<?php
/**
*
* @author Saad Shams :: sshams@live.com
*
* Copy, reuse is prohibited.
* 
*/

class Cleverbug {
	public static $database;
	private static $hostname;
	private static $username;
	private static $password;
	private static $connection;
	
	public static function getConnection() {
		if($_SERVER['SERVER_NAME'] == "localhost" || $_SERVER['SERVER_NAME'] == "127.0.0.1" || $_SERVER['SERVER_NAME'] == "192.168.0.102") {
			self::$hostname = "127.0.0.1";
			self::$username = "root";
			self::$password = "1234";
			self::$database = "cleverbug";
		} else { //for production server
			self::$hostname = "localhost";
			self::$username = "muizz_data";
			self::$password = "GQUw[d6Wt;_~";
			self::$database = "muizz_data";
		}
		
		if(!isset(self::$connection)){
			self::$connection = mysql_connect(self::$hostname, self::$username, self::$password) or trigger_error(mysql_error(), E_USER_ERROR);
			mysql_select_db(self::$database, self::$connection);
			mysql_query("SET NAMES utf8");
		}
		
		return self::$connection;
	}
}

?>