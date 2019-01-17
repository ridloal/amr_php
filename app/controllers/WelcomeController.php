<?php 

/**
 * 
 */
class WelcomeController extends AMRController{
	public $title = 'Welcome';

	public function index(){
		$this->view('welcome/template_header');
		$this->view('welcome/index');
		$this->view('welcome/template_footer');
	}
}