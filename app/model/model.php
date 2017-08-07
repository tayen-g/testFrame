<?php
namespace app\model;

use core\libs\config;
use Medoo\Medoo;

class model extends Medoo
{
    public function __construct()
    {
        // 使用medoo框架操作数据库
        $option = config::getAll('database');
        parent::__construct($option);

        // 调用PDO方法连接数据库
        // $temp     = config::getAll('database');
        // $dsn      = $temp['DSN'];
        // $username = $temp['USERNAME'];
        // $password = $temp['PASSWORD'];
        // try {
        //     parent::__construct($dsn, $username, $password);
        // } catch (\PDOException $e) {
        //     output($e->getMessage());
        // }
        // 


    }

}
