<?php 
require_once "config.default.php";
class costume_config extends default_config{
	public function __construct(){
		parent::__construct();
		
		$this->http_address = "http://costume/";
		$this->title = "Costume | Title";
	}
}
?>