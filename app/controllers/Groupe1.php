<?php
namespace controllers;
use controllers\crud\viewers\Groupe1Viewer;
use Ubiquity\controllers\admin\viewers\ModelViewer;
use controllers\crud\events\Groupe1Events;
use Ubiquity\controllers\crud\CRUDEvents;
use controllers\crud\files\Groupe1Files;
use Ubiquity\controllers\crud\CRUDFiles;

 /**
 * CRUD Controller Groupe1
 **/
class Groupe1 extends \Ubiquity\controllers\crud\CRUDController{

	use WithAuthTrait{
		initialize as _initializeAuth;
	}
	
	public function initialize(){
		$this->_initializeAuth();
		if(!URequest::isAjax()){
			$this->loadView("main/vHeader.html");
		}
	}
	
	public function __construct(){
		parent::__construct();
		$this->model="models\\Groupe";
	}

	public function _getBaseRoute() {
		return 'Groupe1';
	}
	
	protected function getModelViewer(): ModelViewer{
		return new Groupe1Viewer($this);
	}

	protected function getEvents(): CRUDEvents{
		return new Groupe1Events($this);
	}

	protected function getFiles(): CRUDFiles{
		return new Groupe1Files();
	}
	
	protected function getAuthController(): AuthController {
		return new AuthExt();
	}

}
