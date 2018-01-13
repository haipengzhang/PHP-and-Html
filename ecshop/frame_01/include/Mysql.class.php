<?php 
	
	class Mysql extends DB {
		private static $ins = NULL;
		private $mysqli = NULL;
		private $conn = NULL;
		private $conf = array();

		function __construct() {
			$this->conf = Conf::getIns();
			$this->connect($this->conf->host, $this->conf->user, $this->conf->pwd);
			$this->select_db($this->conf->db);
			$this->setChar($this->conf->char);
		}

		public function __destruct() {

		}
		
		public static function getIns() {
			if (self::$ins instanceof self) {
				return self::$ins;
			} else {
				self::$ins = new self();
				return self::$ins;
			}
		}
		
		public function connect($host, $username, $password) {
			$this->conn = mysql_connect($host, $username, $password);
			if(!$this->conn){
				die(mysql_error());
			}
		}
		
		protected function select_db($db) {
			mysql_select_db($db, $this->conn);
		}

		public function setChar($char) {
			mysql_query("set names " . $char);
		}

		public function query($sql) {
			Log::write($sql);
			return mysql_query($sql, $this->conn);
		}

		public function getAll($sql) {
			$rs = $this->query($sql);
			$list = array();
			while ($row = mysql_fetch_assoc($rs)) {
				$list[] = $row;
			}
			return $list;
		} 

		public function getRow($sql) {
			$rs = $this->query($sql);
			return mysql_fetch_assoc($rs);
		}

		public function getOne($sql) {
			$rs = $this->query($sql);
			$row = mysql_fetch_assoc($rs);
			return $row[0];
		}

		public function affected_rows() {
			return mysql_affected_rows($this->conn);
		}

		public function insert_id() {
			return mysql_insert_id($this->conn);
		}

		public function autoExcute($table, $data, $act='insert', $where='where 1 limit 1') {
			if (!is_array($data)) {
				return false;
			}

			if ($act == 'update') {
				$sql = 'update ' . $table . ' set ';
				foreach ($data as $key => $value) {
				 	$sql .= $key . '=\'' . $value . '\',';
				 }
				 $sql = rtrim($sql, ',');
				 $sql .= ' '. $where . ';';

				 return $this->query($sql);
			}

			$sql = 'insert into ' . $table . '(' . implode(',', array_keys($data)) . ')';
			$sql .= ' values (\'';
			$sql .= implode("','", array_values($data));
			$sql .= '\');';
			
			return $this->query($sql);
		}
	}

 ?>