<?php
/*
*	class default_config
*	
*	Carga variables de configuracion que se utilizaran
*	constantemente durante la ejecucion
*
*/
class default_config{

public $document_root;
public $contact_mail;
public $core_root;
public $theme;
public $default_model;
public $default_controller;
public $default_action;
public $custom_model;
public $db_host;
public $db_name;
public $db_user;
public $db_pass;

	public function __construct(){
		//	Variables del servidor
		$this->document_root = $_SERVER['DOCUMENT_ROOT'];
		$this->contact_mail = $_SERVER["SERVER_ADMIN"];

		//	ruta para el core
		$this->core_root = $this->document_root."core/core.php";

		//	Variables basicas del MVC
		$this->theme = 'main';
		$this->default_model = 'main';
		$this->default_controller = 'main';
		$this->default_action = 'index';

		
		//	Variables basicas para conexion con la base de datos
		$this->db_host = 'localhost';
		$this->db_name = 'chessmatch';
		$this->db_user = 'root';
		$this->db_pass = 'spaceship';
	}
}
?>