<?php

class TableObject {

	private $name;
	
	private $columns = array();
	
	private $primaryKeys = array();
	
	public function _construct() {
	
		$args = func_get_args(); //Argments
		
		//Set table name
		$this->setName(
			$args[0] //First argment = table name
		);
		
		//Add columns
		for (
			$i = 1; //Start from second argment
			$i <= count($args)
				- 1 //Convert $args length to position of last element
				- 1; //Skip first argment
			$i++) {
			
				if ($arg[$i] instanceof ColumnObject) {
					$this->addColumn($arg[$i]);
				}
				else {
					break 1;
				}
		}
		
		//Set primary keys
		if (is_array(
			end($args)) { //Last argment
				$this->setPrimaryKeys(end($args));
		}
	}
	
	private function addColumn(ColumnObject $column) {
	
		if (!$this->gotColumn($column)
			&& !empty($column->getName()) //$name is required
			&& !empty($column->getDataType()) //$dataType is required
			&& !empty($column->getSize())) { //$size is required
				$this->columns[] = $column;
		}
	}
	
	public function gotColumn($column) {
	
		foreach ($this->columns as $oldColumn) {
			
			if ($this->getColumnName($column) == $oldColumn->getName()) { //Compare column name
				return TRUE;
			}
		}
		
		return FALSE;
	}
	
	public function getColumn($column) {
	
		foreach ($this->columns as $oldColumn) {
		
			if ($this->getColumnName($column) == $column->getName()) { //Compare column name
				return $column;
			}
		}
	}
	
	private function getColumnName($column) {
	
		if (is_string($column)) {
			return $column; //Column name
		}
		elseif ($column instanceof ColumnObject) {
			return $column->getName();
		}
		
		return '';
	}
	
	private function setName($name) {
		$this->name = $name;
	}
	
	public function getName() {
		return $this->name;
	}
	
	private function setPrimaryKeys($primaryKeys) {
	
		$this->primaryKeys = array();
		
		foreach ($primaryKeys as $primaryKey) {
			$this->addPrimaryKey($primaryKey);
		}
	}
	
	private function addPrimaryKey($primarykey) {
		
		if ($this->gotColumn($primaryKey)
			&& !$this->gotPrimaryKey($primaryKey)) {
				$this->primaryKeys[] = $primarykey;
		}
	}
	
	private function gotPrimaryKey($primaryKey) {
	
		foreach ($this->primaryKeys as $oldPrimaryKey) {
		
			if ($primaryKey == $oldPrimaryKey) {
				return TRUE;
			}
		}
		
		return FALSE;
	}
}

?>