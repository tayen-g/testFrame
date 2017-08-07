<?php
namespace core\libs;

use core\libs\config;

class route
{
    public $controller;
    public $action;
    public function __construct()
    {
        //output($_SERVER);
        //output('route is ready');
        $urlInput = $_SERVER['REQUEST_URI'];
        if (isset($urlInput) && $urlInput != '/testFramework/') {
            $pathArray = explode('/', str_replace('/testFramework/', '', $urlInput));
            //output($pathArray);
            if (isset($pathArray[0])) {
                $this->controller = $pathArray[0];
                unset($pathArray[0]);
            }
            if (isset($pathArray[1])) {
                $this->action = $pathArray[1];
                unset($pathArray[1]);
            } else {
                $this->action = 'index';
            }

        } else {
            //output('1');
            $this->controller = config::get('route', 'CTRL');
            $this->action     = config::get('route', 'ACTION');
        }
        @$count = count($pathArray);
        echo '<br/>';
        if ($count > 1) {
            $i = 2;
            while ($i < $count + 2) {
                if (isset($pathArray[$i + 1])) {
                    $_GET[$pathArray[$i]] = $pathArray[$i + 1];
                    $i += 2;
                }
            }
        } //output($_GET);
    }
}
