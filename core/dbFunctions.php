<?php
/**
 * Abstract class that makes the base for the models's object
 *
 * Contains the functions that will be by default on every object
 * on the model, giving access to basic functions on a data base
 *
 */
abstract class dbFunctions extends coreFunctions{

/**
 * Public variables
 *
 * String $table_name 	name of the table to use 
 * String $condition 	condition be to used after the instruction WHERE
 * String $order_by		option to be used after instruction ORDER BY
 * String $key 			column name to be used as key  
 * boolean $debug 		indicate if debug block will be shown
 *
 */

public $table_name;
public $condition;
public $order_by = "ASC";
public $key = "id";
public $debug = false;

/**
 * Constructor
 */
	function __construct(){
		$this->init();
	}

/**
 * Insert data on the database
 *
 * long
 *
 * @param 
 */
	public function insert( $fields , $values){
		$sql = "";
		$sql .= $this->insertInto();
		$sql .= $this->fields($fields);
		$sql .= $this->values($values);
		$this->debug($sql);
	}

/**
 * Update data from the database
 *
 * long
 *
 * @param 
 */
	public function update( $fields , $values){
		$sql = "";
		$sql .= $this->updateTable();
		$sql .= $this->set( $fields , $values );
		$sql .= $this->condition();
		$this->debug($sql);
	}

/**
 * Delete data from the database
 *
 * long
 *
 * @param 
 */
	public function delete(){
		$sql = "";
		$sql .= $this->deleteRecord();
		$sql .= $this->condition();
		$this->debug($sql);
	}

/**
 * Get data from the database
 *
 * long
 *
 * @param 
 */
	public function select( $fields ){
		$sql = "";
		$this->debug($sql);
	}

/**
 * shortcuts for sql instructions
 *
 * In order to not repeat same instructions several times, return the string that builds
 * the common sentence
 *
 */
	private function insertInto(){
		return "INSERT INTO {$this->table_name} ";
	}

	private function updateTable(){
		return "UPDATE {$this->table_name} SET ";
	}

	private function deleteRecord(){
		return "DELETE FROM {$this->table_name} ";
	}

	private function condition(){
		$str = "WHERE ";
		$str .= $this->condition ? $this->condition : '1'; 
		return $str;
	}

/**
 * shortcuts for fields and values
 * 
 * @param String $fields comma separated string with the fileds to be 
 * @param array $values contains the values to be used on query
 * @return String $str builded string formated (aux,aux,aux)
 */
	private function fields($fields){
		// verify correct format
		$aux = split(",", $fields);
		if(!isset($aux[0])){
			return false;
		}
		// bulid $str formated (fields,fields)
		return "({$fields}) ";
	}
	private function values($values){
		// verify correct format
		if(!is_array($values)){
			return false;
		}
		// build string formated
		$size = count($values);
		$str = "values (";
		for( $i = 0; $i < $size; $i++ ){
			$str .= $values[$i];
			$str .= $i != $size-1 ? "," : "";
		}
		$str .= ") ";
	return $str;
	}

/**
 * Builds the SET string with the fields and values
 *
 * @param String $fields 
 * @param array  $values
 * @return $str String formated field=value for UPDATE querys
 */
	private function set( $fields, $values ){
		$str = "";
		// split fields
		$fields = split(",", $fields);
		$size = count($fields);
		$sizeValues = count($values);
		// Verify lengths $fields = $values
		if( $size != $sizeValues ){
			return false;
		}
		// build str
		for( $i = 0; $i < $size; $i++ ){
			$str .= "{$fields[$i]}={$values[$i]}";
			$str .= $i == $size-1 ? "" : ",";
		}
		return $str." ";
	}

/**
 * sets the debug block
 *
 */
	private function debug($sql){
		if($this->debug){
			echo "<p class='debug'>";
			echo $sql;
			echo "</p>";
		}
	}
}
?>