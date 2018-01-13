<?php 

	/**
	* category model
	*/
	class CatModel extends Model
	{
		protected $table = 'category';
		protected $pk = "cat_id";

		public function getCateSonlist ($id = 0) {
			$data =  $this->db->getAll("select * from $this->table;");
			return $this->getSonTree($data, $id);
		}

		public function getCateFatherList ($id = 0) {
			$data =  $this->db->getAll("select * from $this->table;");
			return $this->getFatherTree($data, $id);
		}
		
		//递归找子孙树
		private function getSonTree ($data, $id = 0, $level = 0) {
			$son = array();
			foreach ($data as $value) {
				if ($value['parent_id'] == $id) {
					$value['level'] = $level;
					$son[] = $value;
					$son = array_merge($son, $this->getSonTree($data, $value['cat_id'], $level+1));
				}
			}
			return $son;
		}

		//寻找特定id的家谱树
		private function getFatherTree ($data, $id = 0) {
			$father = array();
			while ($id > 0) {
				foreach ($data as $key => $value) {
					if ($value[@"cat_id"] == $id) {
						$father[] = $value;
						$id = $value[@"parent_id"];
					}
				}
			}
			return $father;
		}

	}

 ?>