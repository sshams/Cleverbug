<?php

require_once ('library/PureMVC_PHP_1_0_2.php');
require_once ('model/connections/Cleverbug.php');
require_once ('library/SQL.php');
require_once ('library/File.php');
require_once ('model/valueObjects/UserVO.php');

class UserProxy extends Proxy implements IProxy {
	
    const NAME = "UserProxy";
    private $connection;
    
    public function __construct () {
        parent::__construct(self::NAME, null);
		$this->connection = Cleverbug::getConnection();
    }
    
    public function validate() {
    	if(isset($_REQUEST['username'], $_REQUEST['password']) && $_REQUEST['username'] == "admin" && $_REQUEST['password'] == "admin") {
			return true;
    	} else {
    		return false;
    	}
    }
    
    public function get_userVO($user_id) {
    	$query_rsUser = sprintf("SELECT * FROM `user` WHERE user_id = %s", SQL::GetSQLValueString($user_id, "int"));
		$rsUser = mysql_query($query_rsUser, $this->connection) or die(mysql_error() . " " . $query_rsUser);
		$row_rsUser = mysql_fetch_assoc($rsUser);
		$totalRows_rsUser = mysql_num_rows($rsUser);
		
		if($totalRows_rsUser > 0) {
			return new UserVO($row_rsUser['user_id'], $row_rsUser['username'], $row_rsUser['dob']);
		} else {
			return false;
		}
    }
    
    public function get_userVOs() {
    	$query_rsUser = "SELECT user_id, username, dob, " . 
    	"dob + INTERVAL(YEAR(CURRENT_TIMESTAMP) - YEAR(dob)) + 0 YEAR AS current, " .
    	"dob + INTERVAL(YEAR(CURRENT_TIMESTAMP) - YEAR(dob)) + 1 YEAR AS next " . 
    	"FROM `user` ORDER BY CASE WHEN current < CURRENT_TIMESTAMP THEN next ELSE current END";
    	
		$rsUser = mysql_query($query_rsUser, $this->connection) or die(mysql_error() . " " . $query_rsUser);
		$row_rsUser = mysql_fetch_assoc($rsUser);
		$totalRows_rsUser = mysql_num_rows($rsUser);
		$userVOs = array();
		
		if($totalRows_rsUser > 0) {
			do {
				array_push($userVOs, new UserVO($row_rsUser['user_id'], $row_rsUser['username'], $row_rsUser['dob']));
			} while ($row_rsUser = mysql_fetch_assoc($rsUser));
			return $userVOs;
		} else {
			return NULL;
		}
    }
    
    public function register() {
    	
    	if(isset($_POST['username'], $_POST['password'], $_POST['dob'], $_FILES['photo'])) {
    		
    		$insertSQL = sprintf("INSERT INTO `user` (username, dob) VALUES (%s, %s)",
                     SQL::GetSQLValueString($_POST['username'], "text"),
                   	 SQL::GetSQLValueString($_POST['dob'], "date"));

	       	$Result = mysql_query($insertSQL, $this->connection) or die(mysql_error() . " " . $insertSQL);
	       	
    	    if(File::has_extension($_FILES['photo'], array("jpg"))) {
    	    	if(!File::move_uploaded_file($_FILES['photo'], "images", mysql_insert_id())) {
    	    		die("error while uploading photo");
    	    	} else {
    	    		return true;
    	    	}
			} else {
				die("invalid file format, please upload jpg, gif or png");
			}
    	} else {
    		die("please fill all data");
    	}
    }
    
}

?>