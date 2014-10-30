<?php 
class main extends controller{
	public function __construct($config){
		parent::__construct($config);
		$this->tagsCss(array( "bootstrap.min" , "jquery-ui" , "reset" ));
		$this->tagsJs(array( "jquery" , "jquery-ui" , "bootstrap.min" ));
		$this->db_connect();
	}

	public function index(){
		$this->location = get_class($this);
		$this->action = "index";

		$users = new users();
		$users->debug = FALSE;
		$users->insert("name",array("20"));
		$this->build_view( "layout" );
	}
}
?>