<?php
namespace core;

class keyfile
{
    public $assign;
    public static function run()
    {
        //output('ok');
        \core\libs\log::init();
        //调用日志功能，每次启动页面时记录日志
        //\core\libs\log::log('页面启动');
        echo '</br>';
        $route      = new \core\libs\route();
        $controller = $route->controller;
        $action     = $route->action;
        // var_dump($controller);
        // var_dump($action);
        $controllerFile = APP . '/controller/' . $controller . '.php';
        if (is_file($controllerFile)) {
            include $controllerFile;
            $ctrl = new \app\controller\index;
            // 如果输入参数，则调用方法时加入参数
            if (isset($_GET['id'])) {
                $ctrl->$action($_GET['id']);
            } else {
                $ctrl->$action();
            }
        } else {
            throw new \Exception("找不到控制器" . $controller);

        }
    }
    public static function load($class)
    {
        // 自动加载类库
        //$class=str_replace('\\','/',$class);

        $file = FR_DIR . '\\' . $class . '.php';

        if (is_file($file)) {
            include $file;
        } else {
            return false;
        }
    }
    public function assign($name, $val)
    {
        $this->assign[$name] = $val;

    }
    public function display($file)
    {
        $path = APP . '/view/' . $file;
        if (is_file($path)) {
            //extract($this->assign);

            //include $file;
            $loader = new \Twig_Loader_Filesystem(APP . '/view');
            $twig   = new \Twig_Environment($loader, array(
                'cache' => '/path/to/compilation_cache',
                'debug' => DEBUG,
            ));
            $template = $twig->loadTemplate($file);
            $template->display($this->assign ? $this->assign : array());
        }
    }
}
