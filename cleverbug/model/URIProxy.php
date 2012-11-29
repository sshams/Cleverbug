<?php
/**
*
* @author Saad Shams :: sshams@live.com
*
* Copy, reuse is prohibited.
* 
*/

require_once ('library/PureMVC_PHP_1_0_2.php');

class URIProxy extends Proxy implements IProxy {
	
	const NAME = "URIProxy";
	const GET = "GET";
	const POST = "POST";
	
	var $method;
	var $get;
	var $post;
	var $put;
	var $delete;
	
	public function __construct() {
		parent::__construct(self::NAME, isset($_SERVER['PATH_INFO']) ? explode("/", trim($_SERVER['PATH_INFO'], "/")) : '/');
		$this->method = $_SERVER['REQUEST_METHOD'];
		$this->get = $_GET;
		$this->post = $_POST;
		parse_str(file_get_contents('php://input'), $put);
		parse_str(file_get_contents('php://input'), $delete);
	}
}
?>