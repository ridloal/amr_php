<?php 

/**
 * 
 */
class Database{
	private $db_define = DB_DEFINE;
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $db_name = DB_NAME;

	private $dbh;
	private $stmt;
	
	public function __construct(){
		//data source name
		$dsn = $this->db_define .':host='.$this->host.';dbname='.$this->db_name;
		$option = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		];

		try {
		 	$this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
		 } catch (PDOException $e) {
		 	die($e->getMessage());
		 } 
	}

	public function query($q){
		$this->stmt = $this->dbh->prepare($q);
	}

	public function bind($param, $value, $type = null){
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}

		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
		$this->stmt->execute();
	}

	public function resultAll(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function resultSingle(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC); 
	}
}