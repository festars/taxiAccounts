<?php 
class taxiRent{
	
	public $AppName;
	public $AppIcon;
	public $AppVersion;
	
	function __construct(){
		//library		 autoloader
		spl_autoload_register( array( $this,'loadLibrary') );
		//object		 autoloader
		spl_autoload_register( array( $this,'loadObject') );
		
		$this->appName = "taxiRent";		
		$this->appIcon = "fa-taxi";		
		$this->appVersion = taxiRent_APP_VERSION;		
		$route = new libRoute;
	}

	function loadObject($class){		
		//check if library class
		if( substr($class, 0, 3) == 'obj') {
			//get class and filepath
			$class_name = substr($class, 3);
			$class_file = taxiRent_APP_DIR . 'obj/' . strtolower($class_name) . '.php';		
			//file exists
			if( file_exists($class_file) ){
				//require file
				require_once $class_file;
				return true;
			}			
		}
	}
	
	function loadLibrary($class){		
		//check if library class
		if( substr($class, 0, 3) == 'lib') {
			//get class and filepath
			$class_name = substr($class, 3);
			$class_file = taxiRent_APP_DIR . 'lib/' . strtolower($class_name) . '.php';		
			//file exists
			if( file_exists($class_file) ){
				//require file
				require_once $class_file;
				return true;
			}			
		}
	}
	
}