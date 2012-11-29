<?php

require_once ('library/PureMVC_PHP_1_0_2.php');
require_once ('model/UserProxy.php');
require_once ('library/Session.php');
require_once ('view/mediators/UserMediator.php');
require_once ('view/components/User.php');

class LoginCommand extends SimpleCommand implements ICommand {

	public function execute(INotification $notification) {
		$this->facade->registerProxy(new UserProxy());
		$this->facade->registerMediator(new UserMediator(new User()));
		
		$userProxy = $this->facade->retrieveProxy(UserProxy::NAME);
		if($userProxy->validate()) {
			Session::regenerate();
			$_SESSION['login'] = true;
			$this->facade->sendNotification(ApplicationFacade::LOGIN_SUCCESS, $userProxy->get_userVOs());
		} else {
			$this->facade->sendNotification(ApplicationFacade::LOGIN_FAILURE);
		}
	}
	
}

?>