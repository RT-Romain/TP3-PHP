<?php
return array(
	"siteUrl"=>"http://127.0.0.1/TP3RC/",
	"database"=>array(
			"type"=>"mysql",
			"dbName"=>"Messagerie",
			"serverName"=>"127.0.0.1",
			"port"=>3306,
			"user"=>"root",
			"password"=>"",
			"options"=>array(),
			"cache"=>false
			),
	"sessionName"=>"TP3RC",
	"namespaces"=>array(),
	"templateEngine"=>"Ubiquity\\views\\engine\\Twig",
	"templateEngineOptions"=>array(
			"cache"=>false
			),
	"test"=>false,
	"debug"=>false,
	"di"=>array(
			"jquery"=>function ($controller){
							$jquery=new \Ajax\php\ubiquity\JsUtils(["defer"=>true],$controller);
							$jquery->semantic(new \Ajax\Semantic());
							return $jquery;
						}
			),
	"cache"=>array(
			"directory"=>"cache/",
			"system"=>"Ubiquity\\cache\\system\\ArrayCache",
			"params"=>array()
			),
	"mvcNS"=>array(
			"models"=>"models",
			"controllers"=>"controllers",
			"rest"=>""
			),
	"isRest"=>function (){
			return \Ubiquity\utils\http\URequest::getUrlParts()[0]==="rest";
		}
	);