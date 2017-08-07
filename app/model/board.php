<?php
namespace app\model;

use app\model\model;

class board extends model
{
    public $table = 'board';
    public function all()
    {
        // 获取所有留言
        $result = $this->select($this->table, '*');
        return $result;
    }
    public function addOne($data)
    {
        //插入一条留言
        return $this->insert($this->table, $data);
    }

    // public function lists()
    // {
    //     $result = $this->select($this->table, '*');
    //     return $result;
    // }
    // public function getOne($id)
    // {
    //     $result = $this->get($this->table, '*', array("id" => $id));
    //     return $result;
    // }
    // public function setOne($id, $date)
    // {
    //     $result = $this->update($this->table, $date, array("id" => $id));
    //     return $result;
    // }
    public function deleteOne($id)
    {
        $result = $this->delete($this->table, array("id" => $id));
    }

    // PDO操作数据库
    // public function lists()
    // {
    //     $sql    = "select * from " . $this->table;
    //     $result = parent::query($sql);
    //     return $result;
    // }
    // //PDO的exec()方法可以执行sql语句并返回sql语句影响到的行数
    // public function getOne($id)
    // {
    //     $sql    = "select * from " . $this->table . "where 'id'=" . $id;
    //     $result = parent::exec($sql);
    //     return $result;
    // }
    // public function addOne($data)
    // {
    //     $sql    = "insert into " . $this->table . "'title','content' values" . $data['title'] . "," . $data['content'];
    //     $result = parent::exec($sql);
    //     return $result;
    // }
    // public function update($id, $data)
    // {
    //     $sql    = "update " . $this->table . "set 'title'=" . $data['title'] . ",'content'=" . $data['content'] . "where 'id'=" . $id;
    //     $result = parent::exec($sql);
    //     return $result;
    // }
    // public function deleteOne($id)
    // {
    //     $sql    = "delete from " . $this->table . "where 'id'=" . $id;
    //     $result = parent::exec($sql);
    //     return $result;
    // }

}
