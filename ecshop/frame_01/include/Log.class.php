<?php
	
	class Log
	{
		const LOGFILE = 'curr.log';

		public static function write($content) {
			$content .= "\r\n";
			$log = Log::isBak();
			$fh = fopen($log, 'ab');
			fwrite($fh, $content);
			fclose($fh);
		}
		
		public static function bak() {
			$log = ROOT . 'data/log/' . Log::LOGFILE;
			$bak = $log . date('ymd') . mt_rand(100000, 999999) . '.bak';
			return rename($log, $bak);
		}
		
		public static function isBak() {
			$log = ROOT . 'data/log/' . Log::LOGFILE;
			if (!file_exists($log)) {
				touch($log);
				return $log;
			}
			
			$size = filesize($log);
			if ($size <= 1024*1024) {
				return $log;
			}

			if (!Log::bak()) {
				return $log;
			} else {
				touch($log);
				return $log;
			}
		}

	}

 ?>