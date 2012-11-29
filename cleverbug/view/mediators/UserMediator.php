<?php

require_once ('library/PureMVC_PHP_1_0_2.php');
require_once ('view/components/User.php');

class UserMediator extends Mediator implements IMediator {
	
	const NAME = "UserMediator";
	
	public function __construct(User $user) {
		parent::__construct(self::NAME, $user);
	}
	
	public function listNotificationInterests() {
		return array(
			ApplicationFacade::LOGIN_SUCCESS,
			ApplicationFacade::LOGIN_FAILURE,
			ApplicationFacade::USER_SUCCESS,
			ApplicationFacade::USER_FAILURE
		);
	}
	
	public function handleNotification(INotification $notification){
		switch($notification->getName()){
			case ApplicationFacade::LOGIN_SUCCESS:
				$this->viewComponent->login_success($notification->getBody());
				break;
			case ApplicationFacade::LOGIN_FAILURE:
				$this->viewComponent->login_failure();
				break;
			case ApplicationFacade::USER_SUCCESS:
				$this->viewComponent->user_success($notification->getBody());
				break;
			case ApplicationFacade::USER_FAILURE:
				$this->viewComponent->user_failure();
				break;
		}
	}
}

?>