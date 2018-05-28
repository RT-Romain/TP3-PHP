<?php
namespace controllers;
 /**
 * Controller Users
 **/
class Users extends ControllerBase{

	public function index(){
		
	}

	public function users($users){
		
		$this->loadView('Users/users.html');

	}

}
