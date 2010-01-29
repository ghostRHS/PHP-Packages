<?php

class Url {

	private $scheme;
	
	private $host;
	
	private $domain;
	
	private $port;
	
	private $path;
	
	private $url;
	
	public function setScheme($scheme) {
		$this->scheme = $scheme;
	}
	
	public function setHost($host) {
		$this->host = $host;
	}
	
	public function setDomain($domain) {
		$this->domain = $domain;
	}
	
	public function setPort($port) {
		$this->port = $port;
	}
	
	public function setPath($path) {
		$this->path = $path;
	}
	
	private function getScheme() {
		return $this->scheme;
	}
	
	private function getHost() {
		return $this->host;
	}
	
	private function getDomain() {
		return $this->domain;
	}
	
	private function getPort() {
	
		//Commom port values
		$ports = array(
			'http'	=> 80,
			'https'	=> 443
		);
		
		if ($this->port == $ports[$this->getScheme()]) {
			return ''; //Return empty string, if the port is a standard one
		}
		
		return $this->port;
	}
	
	private function getPath() {
		return $this->path;
	}
	
	public function getUrl() {
	
		if (empty($this->url)) {
			$this->buildUrl();
		}
		
		return $this->url;
	}
	
	private function buildUrl() {
		$this->url = $this->getScheme() . '://' . $this->getHost() . '.' . $this->getDomain() . (!empty($this->getPort()) ? ':' . $this->getPort() : '') . '/' . $this->getPath();
	}
}

?>