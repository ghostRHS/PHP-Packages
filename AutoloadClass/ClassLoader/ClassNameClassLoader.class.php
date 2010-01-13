<?php

class ClassNameClassLoader extends ClassLoader {
	
	public function loadClass($className) {
	}
	
	public function getClassPath($className) {
		return $this->classPaths[$className];
	}
}

?>