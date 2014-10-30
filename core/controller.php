<?php 
/**
 * Abstract class that contains db connection
 */

abstract class controller extends coreFunctions{
	/**
	 * Class constructor
	 *
	 * @param object $config config variables
	 */
	public function __construct($config){
		parent::__construct($config);
	}

	public function db_connect(){
		$con = mysqli_connect( $this->config->db_host ,  $this->config->db_user , $this->config->db_pass , $this->config->db_name);
		if(mysqli_connect_errno()){
			echo "Fail connecting mysql : ".mysqli_connect_error();
			return false;
		}
		return $con;
	}
}
?>