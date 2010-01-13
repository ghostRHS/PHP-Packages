<?php

class AutoloadClass {

	/**
	 *	Holds singletom instance of class AutoloadClass
	 *
	 *	@access private
	 *
	 *	@static
	 *
	 *	@var AutoloadClass
	 *
	 *	@since version 1.0
	 */
	private static $instance;
	
	/**
	 *	__construct() set the ini properity unserialize_callback_func to spl_autoload_call, 
	 *	and register a spl autoload function
	 *
	 *	@access private
	 *
	 *	@since version 1.0
	 */
	private function __construct() {
	
		ini_set('unserialize_callback_func', 'spl_autoload_call');
		spl_autoload_register(array(self::getInstance(), 'loadClass'));
	}
	
	/**
	 *	Get the singleton instance of class AutoloadClass
	 *
	 *	@access public
	 *
	 *	@static
	 *
	 *	@return AutoloadClass	Returns a singleton instance of class AutoloadClass
	 *
	 *	@since version 1.0
	 */
	public static function getInstance() {
	
		if (empty(self::$instance)) {
			self::$instance = new AutoloadClass;
		}
		
		return self::$instance;
	}
	
	public function loadClass($name) {
	
		if ($this->isNamespace($name)) {
		
			require_once
			
			$classLoader = new NamespaceClassLoader;
		}
		else {
		
			require_once
			
			$classLoader = new ClassNameClassLoader;
		}
		
		$classLoader->loadClass($name);
	}
	
	public function isNamespace($name) {
	
		if (preg_match('^([A-Z]([a-z]{0,})\\)+[A-Z][a-z]+(\(\))?$', $name)) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
}

?>