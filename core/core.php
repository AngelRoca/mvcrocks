<?php
	class core{
		public $config;
		private $root;

		public function __construct($config){
			$this->root = $_SERVER['DOCUMENT_ROOT'];
			$this->config = $config;
			$this->load_core();
			$this->load_model();
		}

		private function load_model(){
			$model = "{$this->root}model/model.";
			$model .= $this->config->custom_model ? $this->config->custom_model : $this->config->default_model;
			$model .= ".php";
			include_once $model;
		}

		private function load_core(){
			include_once "{$this->root}core/coreFunctions.php";
			include_once "{$this->root}core/controller.php";
			include_once "{$this->root}core/dbFunctions.php";
		}

		public function load_controller(){
			$controller_name = isset($_GET["controller"]) ? $_GET["controller"] : $this->config->default_controller;
			$action_name = isset($_GET["action"]) ? $_GET["action"] : $this->config->default_action;

			$controller_main = "{$this->config->document_root}controller/controller.main.php";
			$controller_file="{$this->config->document_root}controller/controller.$controller_name.php";
			if(file_exists($controller_file)){
				include_once $controller_main;
				include_once $controller_file;
				$controller = new $controller_name($this->config);
				if(method_exists($controller, $action_name)){
					$controller->$action_name();
				}else{
					echo "<p> Sorry, this action is unreachable. </p>";
				}
			}else{
				echo "<p> $controller_name doesn't exist. </p>";
			}
		}

	}
?>