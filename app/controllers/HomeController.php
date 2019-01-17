<?php 

/**
 * 
 */
class HomeController extends AMRController{
	public $title = 'Home';

	public function index(){

		$data['framework'] = $this->model('Home')->getData();

		$this->view('template/bs4_header', $data);
		$this->view('home/index', $data);
		$this->view('template/bs4_footer', $data);
	}
}