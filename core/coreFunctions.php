<?php 
/**
 * General functions for the core
 *
 * abstract class that contains the general functions that will be
 * reachable throughtout the execution
 *
 */
abstract class coreFunctions{

/**
 * public variables
 *
 * object 	$config 	contains the general configs
 * array 	$tagscss 	contains the css tags to be included
 * array 	$tagsjs 	contains the js tags to be included
 * String 	$content 	contains the content builded
 * String 	$location 	name of the folder containing the view
 */
	public $config;
	public $tagscss;
	public $tagsjs;
	public $location;

/**
 * constructor for coreFunctions
 *
 * Initialize the public function $config to be accesible 
 * anytime
 *
 * @param object $config configuration variables
 */
	public function __construct($config){
		$this->config = $config;
		}

/**
 * SECTION 
 *	Functions to build the view
 */

/**
 * Includes a module ubicated on the given folder
 * 
 * calls an extract of code and makes it part of the current view
 *
 * @param String $folder name of the folder where is located the module
 * @param String $module name of the file, without extession
 */
	public function include_module( $folder = "main", $module = "index"){
		$location = "{$this->config->document_root}view/{$folder}/{$module}.php";
		if(file_exists($location)){
			include $location;
		}else{
			echo "<p>The requested module does not exist</p>";
		}
	}

/**
 * Includes the layout to build the whole view
 *
 * there could be several layouts, so one of them can be chosen
 *
 * @param String layout name of the layout file without extenssion
 */
	private function include_layout($layout = "layout"){

		$location = "{$this->config->document_root}view/layout/{$layout}.php";
		if(file_exists($location)){
			include_once $location;
		}else{
			echo "<p>The requested layout does not exist</p>";
		}
	}

/**
 * build the view to the user
 *
 * taking the parts this function build the requested view
 *
 * @param String $layout name of the layout
 * @param String $controller name of the controller
 * @param String $action name of the action
 */
	public function build_view( $layout ){
		$this->include_layout( $layout );
	}

/**
 * Includes one or more css files
 *
 * @param array tags names without extenssions 
 */
	public function tagsCss($tags){
		$location = "/view/css-js-img/css/";
		$str = "";
		foreach ($tags as $tag) {
			$str .= "<link href='{$location}{$tag}.css' rel='stylesheet' type='text/css' />";
		}
		$this->tagscss .= $str;
	}

/**
 * Includes one or more js files
 *
 * @param array tags names without extenssions 
 */
	public function tagsJs($tags){
		$location = "/view/css-js-img/js/";
		$str = "";
		foreach ($tags as $tag) {
			$str .= "<script src='{$location}{$tag}.js' type='text/javascript'></script>";
		}
		$this->tagsjs .= $str;
	}

/**
 * Builds the css tags
 *
 * takes and array with tha names of the css files and make a string
 * ready to be printed
 *
 * @param array $tags contains the names of the files
 */
	public function printCssTags($tags){
		if(isset($tags)){
			echo $tags;
		}
	}

/**
 * Builds the js tags
 *
 * takes and array with tha names of the js files and make a string
 * ready to be printed
 *
 * @param array $tags contains the names of the files
 */
	public function printJsTags($tags){
		if(isset($tags)){
			echo $tags;
		}
	}

/**(En posible desuso)
 * replaces the dictionary's words
 *
 * the content of the source is replaced by their corresponding value 
 * from the given directory
 *
 * @param String $html the soruce
 * @param array $dic the directory of contents
 * @return String $html the result of replacing the dictionary. false if there was an error
 */
private function renderize( $html, $dic = null ){
	if( !isset($html) ){
		return false;
	}elseif(!isset($dic)){
		$result = $html;
	}else{
		foreach ($dic as $name => $element) {
		$html = str_replace("{".$name."}", $element, $html);
		}
		$result = $html;
	}
	echo $html;
}

/**
 * Debug tool to show details of given variable
 * 
 * @param object $var any varibble to debug
 */
public function vardump($var){
	echo "<pre class='debug'>";
	var_dump($var);
	echo "</pre>";
}

}
?>