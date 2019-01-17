<?php 

/**
 * Author : Muhammad Ridlo Alimudin
 * Date   : 17 Januari 2019
 */
class AMRController{
	
	protected function view($view, $data = []){
		require_once 'app/views/'. $view .'.php';
	}

	protected function model($model){
		$modelName = $model.'Model';
		require_once 'app/models/'. $modelName .'.php';
		return new $modelName;
	}


}