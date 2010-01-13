<?php

abstract class ClassLoader {

	abstract public function loadClass();
	
	/**
	 *	loadFile() require a working file
	 *
	 *	@access private
	 *
	 *	@param string $filePath		Path of a file
	 *
	 *	@return bool	Returns TRUE if the file was required successfully, FALSE otherwise
	 *
	 *	@since version 1.0
	 */
	protected function loadFile($filePath) {
	
		if (file_exists($filePath) {
		
			if ($this->isFileReadable($filePath)) {
			
				require_once $filePath;
				
				return TRUE;
			}
			else {
				//Exception
			}
		}
		else {
			//Exception
		}
		
		return FALSE;
	}
	
	/**
	 *	Check if a file is readable
	 *
	 *	@access private
	 *
	 *	@param string $filePath		Path of a file
	 *
	 *	@return bool	Returns True if the file is readable, FALSE otherwise
	 *
	 *	@since version 1.0
	 */
	protected function isFileReadable($filePath) {
	
		if ($handle = fopen($filePath, 'r')) {
		
			fclose($handle);
			
			unset($handle);
			
			return TRUE;
		}
		
		unset($handle);
		
		return FALSE;
	}
}

?>