<?php 
	/**
	* 配置文件读写类
	*/
	class Conf {
		protected static $ins = null;
		protected $data = array();

		final protected function __construct() {
			include(ROOT.'include/config.inc.php');
			$this->data = $_CFG;
		}

		final protected function __clone() {

		}

		public static function getIns() {
			if (self::$ins instanceof self) {
				return self::$ins;
			} else {
				self::$ins = new self();
				return self::$ins;
			}
		}

		//通过__get魔术方法动态获取config里面的值
		public function __get($key) {
			if (array_key_exists($key, $this->data)) {
				return $this->data[$key];
			} else {
				return null;
			}
		}

		public function __set($key, $value) {
			 $this->data[$key] = $value;
		}
	}

 ?>