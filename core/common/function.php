<?php
function output($var)
{
    if (is_null($var)) {
        dump(null);
    } else {
        dump($var);
    }
}
/**
 * 接收post方法传值
 * @param   $name    对应值
 * @param   $default 默认值
 **/
function post($name, $default = false)
{
    if (isset($name)) {
        return $_POST[$name];
    } else {
        return $default;
    }
}

function jump($url)
{
    header('Location: ' . $url);
    exit();
}
