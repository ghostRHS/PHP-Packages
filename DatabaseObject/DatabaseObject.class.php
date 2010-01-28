<?php

class DatabaseObject {

	private $name;
	
	private $tables = array();
	
	public function _construct() {
	
		$args = func_get_args(); //Argments
		
		//Set database name
		$this->setName(
			$args[0] //First argment = database name
		);
		
		//Set tables
		$this->setTables(
			array_slice(
				$args, 
				1 //Start from second argment
		));
	}
	
	private function setName($name) {
		$this->name = name;
	}
	
	public function getName() {
		return $this->name;
	}
	
	private function setTables($tables) {
	
		foreach ($tables as $table) {
			$this->addTable($table);
		}
	}
	
	private function addTable(TableObject $table) {
	
		if (!$this->gotTable($table)) {
			$this->tables[] = $table;
		}
	}
	
	public function gotTable($table) {
	
		foreach ($this->tables as $table) {
		
			if ($this->getTableName($table) == $table->getName()) { //Compare table name
				return TRUE;
			}
		}
		
		return FALSE;
	}
	
	private function getTableName($table) {
	
		if (is_string($table)) {
			return $table; //Table name
		}
		elseif ($table instanceof TableObject) {
			return $table->getName();
		}
		
		return '';
	}
	
	public function getTable($tableName) {
	
		foreach ($this->tables as $table) {
		
			if ($tableName == $table->getName()) {
				return $table;
			}
		}
	}
}

?>