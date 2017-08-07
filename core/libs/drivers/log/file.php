<?php 
	namespace core\libs\drivers\log;

	use core\libs\config;
	//日志写入文件系统中
	class file{
		public $path;//日志存放路径
		public function __construct(){
			 $temp = config::get('log','OPTION');
			 $this->path = $temp['PATH'];
		}
		public function log($msg,$file='log'){
			/**
			 * 确定日志存储位置是否存在
			 * 不存在，创建目录；
			 * 存在，写入日志
			 */
			if(!is_dir($this->path)){
				mkdir($this->path,'0777',true);
			}
			$msg=date('Y-M-D H:i:s').' '.$msg;
			return file_put_contents($this->path.date('Y-m-d h').$file.'.txt',json_encode($msg).PHP_EOL,FILE_APPEND);
		}
	}
 ?>