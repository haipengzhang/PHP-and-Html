<?php 
	/**
	* goods model
	*/
	class GoodsModel extends Model
	{
		protected $table = 'goods';
		protected $pk = "goods_id";

		public function getGoods() {
			return $this->db->getAll("select * from $this->table where is_delete = 0;");
		}

		public function trushGoods($goods_id) {
			return $this->update(array('is_delete'=>true), $goods_id);
		}

		public function trushedGoodsList() {
			return $this->db->getAll("select * from $this->table where is_delete = 1;");
		}

	}
 ?>