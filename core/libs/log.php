<?php 
	namespace core\libs;
	use core\libs\config;

	class log{
		static $class;
		/**
		 * 1、确定日志存储方式
		 * 
		 * 2、写日志
		 */
		static function init(){
			//初始化函数，确定存储方式
			$driver = config::get('log','DRIVER');
			$class = '\core\libs\drivers\log\\'.$driver;
			self::$class =new $class;
			//echo 'log sucess <br/>';
		}
		static function log($name,$file='log'){
			self::$class->log($name,$file);
		}
	}
 ?>