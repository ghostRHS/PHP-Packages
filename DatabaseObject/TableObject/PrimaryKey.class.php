<?php

class PrimaryKey {

	private $keys = array();
	
	public function _construct() {
		$this->setKeys(func_get_args());
	}
	
	private function setKeys($keys) {
	
		$this->keys = array();
		
		foreach ($keys as $key) {
			$this->addKey($key);
		}
	}
	
	private function addKey($key) {
	
		if (!$this->gotKey($key)) {
			$this->keys[] = $key;
		}
	}
	
	private function gotKey($key) {
	
		foreach ($this->keys as $oldKey) {
		
			if ($key == $oldKey) {
				return TRUE;
			}
		}
		
		return FALSE;
	}
}

?>