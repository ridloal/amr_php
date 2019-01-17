<?php 

/**
 * Author : Muhammad Ridlo Alimudin
 * Date   : 17 Januari 2019
 */
class AMRController{
	
	protected function view($view, $data = []){
		require_once 'app/views/'. $view .'.php';
	}


}