<?php
namespace controllers;

use Ubiquity\controllers\auth\AuthController;
use Ubiquity\controllers\auth\WithAuthTrait;
 use Ubiquity\orm\DAO;
use Ajax\php\ubiquity\JsUtils;

 /**
 * Controller Organizations
 * @property JsUtils $jquery
 **/
class Organizations extends ControllerBase{
	use WithAuthTrait;

	public function index(){
		$organisations=DAO::getALL("models\\Organization");
		$this->loadView("Organizations/index.html",["orgas"=>$organisations]);
	}

	public function display($idOrga,$idGroupe=null){
		$orga=DAO::getOne("models\\Organization",$idOrga, true, true);
		$users=$this->users($orga->getUsers(),$idOrga,$idGroupe);
		$this->jquery->renderView("Organizations/Display.html",["orga"=>$orga,"users"=>$users]);
	}


	protected function users($users=null,$idOrga,$idGroupe=null){
		if(isset($idGroupe)){
			$group=DAO::getOne("models\\Groupe",$idGroupe,true,true);
			$title=$group->getName();
			$users=DAO::getManyToMany($group, "users");
		}else{
			$title="Tous les utilisateurs";
		}
		return $this->loadView("Organizations/users.html",compact("users","title"),true);
	}
	
	protected function getAuthController(): AuthController {
		return new AuthExt();
	}
	

} 