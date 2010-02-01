<?php

class TableObject {

	private $name;
	
	private $columns = array();
	
	private $primaryKey;
	
	public function _construct() {
	
		$args = func_get_args(); //Argments
		
		//Set table name
		$this->setName(
			$args[0] //First argment = table name
		);
		
		$i = 1;
		
		//Add columns
		while (
			$i <= count($args)
				- 1 //Convert $args length to position of last element
			&& $arg[$i] instanceof ColumnObject) {
			
				$this->addColumn($arg[$i]);
				
				$i++; //Point to next argment
		}
		
		//Set primary key
		if (
			!empty(
				$args[$i]) //Pointed to correct argment by while loop above
			&& $arg[$i] instanceof PrimaryKey) {
				$this->setPrimaryKey($primaryKey);
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
	
	private function setPrimaryKey(PrimaryKey $primaryKey) {
		$this->primaryKey = $primaryKey;
	}
}

?>