<?php

class ColumnObject {

	private $name;
	
	private $dataType;
	
	private $size;
	
	private $defaultValue;
	
	private $options;
	
	public function _construct() {
	
		$args = func_get_args(); //Argments
		
		//Set column name
		$this->setName(
			$args[0] //First argment = column name
		);
		
		//Set data type
		$this->setDataType(
			$args[1] //Second argment = data type
		);
		
		//Set size
		$this->setSize(
			$args[2] //Third argment = size
		);
		
		$i = 3; //Point to the fourth argment
		
		//Set default value, optional
		if (!empty($args[$i])
			&& !$this->isValidOption($args[$i])) {
		
				$this->setDefaultValue($args[$i]);
			
				$i++; //Point to the fifth argment
		}
		
		//Set options, optional
		if (!empty(
			$options = array_slice(
				$args,
				$i))) { //Start from fourth argment if not used, else fifth
					$this->setOptions($options);
		}
	}
	
	private function setName($name) {
		$this->name = $name;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getDataType() {
		return $this->dataType;
	}
	
	public function getSize() {
		return $this->size;
	}
	
	private function setDataType($dataType) {
	
		$dataType = //DataType in lower case
			strtolower($dataType);
			
		if ($this->ValidDataType($dataType)) {
		
			$this->dataType = //DataType in long form
				$this->convertDataTypeToLongForm($dataType);
		}
	}
	
	private function setDefaultValue($defaultValue) {
		$this->defaultValue = $defaultValue;
	}
	
	private function setOptions($options) {
	
		$this->options = array();
		
		foreach ($options as $option) {
			$this->addOption($oprion);
		}
	}
	
	private function addOption($option) {
	
		$option = strtolower($option);
		
		if ($this->isValidOption($option)) {
		
			if (!$this->gotOption($option)) {
				$this->options[] = $option;
			}
		}
	}
	
	private function gotOption($option) {
		return in_array($option, $this->options);
	}
	
	private function isValidOption($option) {
	
		return in_array(
			$option,
			array('null', 'not null', 'auto increment')
		);
	}
	
	private function setSize($size) {
		$this->size = $size;
	}
	
	private function isValidDataType($dataType) {
	
		return in_array(
			$dataType,
			array('int', 'str', 'integer', 'string')
		);
	}
	
	private function convertDataTypeToLongForm($dataType) {
	
		if ($dataType == 'int') {
			return 'interger';
		}
		elseif ($dataType == 'str') {
			return 'string';
		}
		else {
			return $dataType;
		}
	}
}

?>