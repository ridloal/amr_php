<?php

/**
 * 
 */
class HomeModel{
 	private $table = 'home';
 	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function getData(){
		$this->db->query('SELECT * FROM '.$this->table);
		return $this->db->resultAll();
	}
}