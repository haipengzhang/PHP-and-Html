<?php 
	
	function _addslashes($arr) {
		foreach ($arr as $key => $value) {
			if (is_string($value)) {
				$arr[$key] = addslashes($value);
			} else if (is_array($value)) {
				$arr[$key] = _addslashes($value);
			}
		}
		return $arr;
	}

 ?>