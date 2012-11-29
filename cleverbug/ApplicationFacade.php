<?php
/**
*
* @author Saad Shams :: sshams@live.com
*
* Copy, reuse is prohibited.
* 
*/
require_once ('library/PureMVC_PHP_1_0_2.php');
require_once ('controller/commands/StartupCommand.php');
require_once ('controller/commands/LoginCommand.php');
require_once ('controller/commands/UserCommand.php');

class ApplicationFacade extends Facade implements IFacade {
	
	//for commands
	const STARTUP = "startup";
	const LOGIN = "login";
	const USER = "user";
	
	//for communication across system
	const HOME = "home";
	const REGISTER_FORM = "registerForm";
	const LOGIN_SUCCESS = "loginSuccess";
	const LOGIN_FAILURE = "loginFailure";
	const USER_SUCCESS = "userSuccess";
	const USER_FAILURE = "userFailure";
	
	public static function getInstance() {
		if(parent::$instance == null) {
			parent::$instance = new ApplicationFacade();
		}
		return parent::$instance;
	}
	
	protected function initializeController() {
		parent::initializeController();
		$this->registerCommand(self::STARTUP, 'StartupCommand'); 
		$this->registerCommand(self::LOGIN, 'LoginCommand');
		$this->registerCommand(self::USER, 'UserCommand');
	}
	
	public function startup($params=null) {
		$this->sendNotification(self::STARTUP);
	}
	
}
?>