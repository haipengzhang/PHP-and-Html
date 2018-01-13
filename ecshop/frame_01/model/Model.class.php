<?php 
	
	class Model
	{
		protected $table = NULL;	//model所控制的表
		protected $db = NULL;		//mysql对象
		protected $pk = NULL;		//id
		public function __construct()
		{
			$this->db = Mysql::getIns();
		}

		public function table($table) {
			$this->table = $table;
		}

		public function add($data) {
			return $this->db->autoExcute($this->table, $data);
		}
		
		public function delete ($id) {
			$this->db->query("delete from $this->table where " . $pk ." = $id;");
			return $this->db->affected_rows();
		}

		public function find ($id) {
			return $this->db->getRow("select * from $this->table where  " . $this->pk ."  = $id;");
		}

		public function getAll () {
			return $this->db->getAll("select * from $this->table");
		}

		public function update ($data, $id) {
			$this->db->autoExcute($this->table, $data, 'update', 'where ' . $this->pk .'='. $id);
			return $this->db->affected_rows();
		}

	}


 ?>