<?php
namespace controllers;
use Ubiquity\controllers\Startup;
use Ubiquity\utils\http\USession;
use Ubiquity\utils\http\URequest;
use Ubiquity\orm\DAO;

 /**
 * Auth Controller TestAuth
 **/
class TestAuth extends \Ubiquity\controllers\auth\AuthController{

	protected function onConnect($connected) {
		$urlParts=$this->getOriginalURL();
		USession::set($this->_getUserSessionKey(), $connected);
		if(isset($urlParts)){
			Startup::forward(implode("/",$urlParts));
		}else{
			$this->forward("controllers\\Organizations","display",[$connected->getOrganization()->getId()],true,true);
		}
	}

	protected function _connect() {
		if(URequest::isPost()){
			$email=URequest::post($this->_getLoginInputName());
			$password=URequest::post($this->_getPasswordInputName());
			$user=DAO::getOne("models\\User", "email='{$email}'");
			if(isset($user) && $user->getPassword()==$password){
				return $user;
			}
		}
		return;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Ubiquity\controllers\auth\AuthController::isValidUser()
	 */
	public function _isValidUser() {
		return USession::exists($this->_getUserSessionKey());
	}

	public function _getBaseRoute() {
		return 'TestAuth';
	}

		
		

	}


