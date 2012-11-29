<?php

require_once ('library/PureMVC_PHP_1_0_2.php');
require_once ('library/Session.php');
require_once ('model/UserProxy.php');
require_once ('view/mediators/UserMediator.php');
require_once ('view/components/User.php');

class UserCommand extends SimpleCommand implements ICommand {

	public function execute(INotification $notification) {

		$this->facade->registerProxy(new UserProxy());
		$userProxy = $this->facade->retrieveProxy(UserProxy::NAME);
		$this->facade->registerMediator(new UserMediator(new User()));
		
		$uriProxy = $this->facade->retrieveProxy(URIProxy::NAME);
		$params = $uriProxy->getData();
				
		switch($this->facade->retrieveProxy(URIProxy::NAME)->method) {
			case URIProxy::GET:
				Session::start();
				if(isset($_SESSION['login']) && $_SESSION['login']) {
					$userVO = $userProxy->get_userVO($params[1]);
					$this->facade->sendNotification(ApplicationFacade::USER_SUCCESS, $userVO);
				} else {
					$this->facade->sendNotification(ApplicationFacade::USER_FAILURE);
				}
				break;
			default:
				break;
		}

	}
	
}

?>