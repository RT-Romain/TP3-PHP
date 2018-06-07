<?php
namespace controllers;
 use models\Groupe;
use Ubiquity\utils\http\URequest;
use Ubiquity\orm\DAO;

 /**
 * Controller Groupes
 **/
class Groupes extends ControllerBase{

	public function index(){
		echo "index";
	}

	public function form(){
		
		$this->loadView('Groupes/form.html');

	}


	public function new(){
		if(URequest::isPost()){
			$groupe=new Groupe();
			$organisation=DAO::getOne("models\\Organization",2);
			$groupe->setOrganization($organisation);
			$groupe->setName(URequest::post("nom"));
			if(!DAO::save($groupe)){
				echo  "Erreur";
			}else{
				echo "Groupe {$groupe} ajout�" ;
			}
			$this->loadView('Groupes/new.html');
		}else{
			echo "Vous devez passer pas un formulaire ! ";
		}

	}

}
