<?php 

/**
 * Author : Muhammad Ridlo Alimudin
 * Date   : 17 Januari 2019
 */
class App{
	protected $controller = DEF_CONTROLLER.'Controller';
	protected $method = DEF_METHOD;
	protected $params = [];
	
	public function __construct(){
		$url = $this->parseURL();

		//controller
		if (file_exists('app/controllers/'. $url[0] . 'Controller.php')) {
			$this->controller = $url[0].'Controller';
			unset($url[0]);
		}
		require_once 'app/controllers/'. $this->controller .'.php';
		$this->controller = new $this->controller;

		//method
		if (isset($url[1])){
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		//parameter 
		if (!empty($url)) {
			$this->params = array_values($url);
		}

		call_user_func_array([$this->controller, $this->method], $this->params);
		
	}

	public function parseURL(){
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode ('/', $url);
			return $url;
		}
	}
}