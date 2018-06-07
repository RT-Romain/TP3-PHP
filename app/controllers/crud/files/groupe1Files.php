<?php
namespace controllers\crud\files;

use Ubiquity\controllers\crud\CRUDFiles;
 /**
 * Class Groupe1Files
 **/
class Groupe1Files extends CRUDFiles{
	public function getViewIndex(){
		return "Groupe1/index.html";
	}

	public function getViewForm(){
		return "Groupe1/form.html";
	}

	public function getViewDisplay(){
		return "Groupe1/display.html";
	}

	public function getBaseTemplate() {
		return "base.html";
	}
}
