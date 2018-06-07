<?php

namespace controllers;
use controllers\auth\files\AuthExtFiles;
use Ubiquity\controllers\auth\AuthFiles;
use Ubiquity\utils\http\USession;

 /**
 * Auth Controller AuthExt
 **/
class AuthExt extends \controllers\TestAuth{

	public function _getBaseRoute() {
		return 'AuthExt';
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Ubiquity\controllers\auth\AuthController::getFiles()
	 */
	
	public function _isValidUser() {
		$valid=parent::_isValidUser ();
		if($valid && $this->_action=="display" && $this->_controller=="controllers\Organizations"){
			$user=USession::get($this->_getUserSessionKey());
			$valid=$user->getOrganization()->getId()==$this->_actionParams[0];
			if(!$valid){
				$this->_setNoAccessMsg("Vous n'appartenez pas à cette organisation","Accès non autorisé");
				$this->_setLoginCaption("Se connecter avec un autre compte");
				$bt=$this->jquery->semantic()->htmlButton("btReturn","Retourner à la page précédente");
				$bt->onClick("window.history.go(-1); return false;");
			}
		}
		return $valid;
	}
	
	
	
	protected function getFiles(): AuthFiles{
		return new AuthExtFiles();
	}

	public function _displayInfoAsString() {
		return true;
	}

	protected function badLoginMessage(\Ubiquity\utils\flash\FlashMessage $fMessage) {
		$fMessage->setTitle("Erreur d'authentification");
		$fMessage->setContent("Login ou mot de passe incorrects !");
		$this->_setLoginCaption("Essayer à nouveau");
		
	}

	
	protected function noAccessMessage(\Ubiquity\utils\flash\FlashMessage $fMessage){
	$fMessage->setTitle("T'as pas le droit !");
	$fMessage->setContent("Allez OUST !");
	$this->_setLoginCaption("Ou alors connectes toi ");
	}
	
	protected function terminateMessage(\Ubiquity\utils\flash\FlashMessage $fMessage){
	$fMessage->setTitle("Déconnexion réussie ");
	$fMessage->setContent("Reviens quand tu veux");
	$this->_setLoginCaption("Reviens tu nous manques déjà :( ");
	}
	
	
	public function _checkConnectionTimeout() {
		return 10000;
	}
	
	
	protected function attemptsNumber() {
		return 3;
	}
}
