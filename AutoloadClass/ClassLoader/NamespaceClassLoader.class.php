<?php

class NamespaceClassLoader extendss ClassLoader {

	/**
	 *	Holds the path of a php file generete by $this->buildFilePath()
	 *
	 *	@access private
	 *
	 *	@var string
	 *
	 *	@since version 1.0
	 */
	private $filePath;
	
	/**
	 *	Holds the class name generete by $this->buildClassName()
	 *
	 *	@access private
	 *
	 *	@var string
	 *
	 *	@since version 1.0
	 */
	private $className;
	
	/**
	 *	loadClass() finds a class for you according the a commom naming comvention of namespace
	 *
	 *	@access public
	 *
	 *	@param string $namespace	A namespace
	 *
	 *	@return bool	Returns TRUE if $namespace can lead to a class, FALSE otherwise
	 *
	 *	@since version 1.0
	 */
	public function loadClass($namespace) {
	
		if ($this->loadFile($this->getFilePath($namespace))) {
		
			if (class_exists($this->getClassName($namespace), FALSE)
				|| interface_exists($this->getClassName($namespace), FALSE)) {
					return TRUE;
			}
			else {
				//Exception
			}
		}
		
		return FALSE;
	}
	
	/**
	 *	buildFilePath() turns namespace into file path
	 *
	 *	@access private
	 *
	 *	@param string $namespace
	 *
	 *	@since version 1.0
	 */
	private function buildFilePath($namespace) {
		$this->filePath = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . '.class.php';
	}
	
	/**
	 *	Get the file path according to the namespace suppplied
	 *
	 *	@access public
	 *
	 *	@param string $namespace	A namespace
	 *
	 *	@return string		Returns a file path
	 *
	 *	@since version 1.0
	 */
	public function getFilePath($namespace) {
	
		if (empty($this->filePath)) {
			$this->buildFilePath($namespace);
		}
		
		return $this->filePath;
	}
	
	/**
	 *	buildClassName() turns namespace into a class name
	 *
	 *	@access private
	 *
	 *	@param string $namespace	A namespace
	 *
	 *	@since version 1.0
	 */
	private function buildClassName($namespace) {
		$this->className = end(explode('\\', $namespace));
	}
	
	/**
	 *	Get class name according to the namespace supplied
	 *
	 *	@access public
	 *
	 *	@param string $namespace	A namespace
	 *
	 *	@return string		Returns a class name
	 *
	 *	@since version 1.0
	*/
	public function getClassName($namespace) {
	
		if (empty($this->className)) {
			$this->buildClassName($namespace);
		}
		
		return $this->className;
	}
}

?>