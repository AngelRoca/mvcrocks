<?php 
/**
 * classes to make model objects
 *
 * classes that define the objects to be used to interact with the bd
 * Instructions : 
 * create a class with a significant name,
 * the new class extends the abstract class dbFunctions
 * create a the function init to set up initial variables
 * set the property $this->table_name with the name of table,
 *
 */

class users extends dbFunctions{
	public function init(){
		$this->table_name = "users";
	}
}
?>