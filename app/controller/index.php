<?php
namespace app\controller;

use app\model\model;

class index extends \core\keyfile
{
    // public function index()
    //{
    /**
     * 数据库测试
     */
    //output('index index index');
    // $model  = new \app\model\model();
    // $sql    = "select * from user";
    // $result = $model->query($sql);
    // print_r($result->fetchAll());

    /**
     * 配置文件测试
     */
    //  $temp = \core\libs\config::get('route', 'CTRL');
    // print_r($temp);

    /**
     * 视图测试
     */
    // public function index(){
    // $data  = 'View test success';
    // $title = "view's title";
    // $this->assign('data', $data);
    // $this->assign('title', $title);
    // $this->display('index.html');
    // }
    /**
     * twig测试
     */
    // $data  = 'View test success';
    // $this->assign('data', $data);
    // $this->display('index.html');
    //}

    // 查看留言
    public $data = array();
    public function index()
    {
        $model = new \app\model\board;
        $data  = $model->all();

        $this->assign('data', $data);

        // $model = new model();
        // $data = $model->select('user','*');//medoo查询
        //$data = $model->getOne(1);
        //dump($data);
        $this->display('index.html');
    }

    // 添加留言
    public function add()
    {
        $this->display('add.html');
    }

    // 保存留言
    public function save()
    {
        $data['title'] = $_POST['title'];

        $data['content'] = $_POST['content'];

        //output($data);
        $model = new \app\model\board;
        if ($model->addOne($data)) {
            echo "留言成功,3s后跳转到首页";
            header("Refresh:3;url=http://127.0.0.1/testFramework/");
        } else {
            echo '留言失败';
        };
    }

    public function deleteOne($id)
    {
        $model = new \app\model\board;
        if (!$model->deleteOne($id)) {
            echo "删除成功,3s后跳转到首页";
            header("Refresh:3;url=http://127.0.0.1/testFramework/");
        } else {
            echo '删除失败';
        }

    }
}
