<?php
namespace controllers;

 

 use Ubiquity\orm\DAO;

 /**
 * Controller Organizations
 **/
class Organizations extends ControllerBase{

	public function index(){
		$organisations=DAO::getALL("models\\Organization");
		$this->loadView("Organizations/index.html",["orgas"=>$organisations]);
	}

	public function Display($idOrga){
		$orga=DAO::getOne("models\\Organization");
		
		$this->loadView('Organizations/Display.html');

	}


	public function users($users){
		$title="Tous les utilisateurs";
		$this->loadView('Organizations/users.html');

	}

}
