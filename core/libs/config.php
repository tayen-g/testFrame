<?php
namespace core\libs;

class config
{
    static $conf = array();
    public static function get($file, $name)
    {
        /**
         * 1、配置文件是否存在
         * 2、对应配置是否存在
         * 3、如果配置已被加载过，缓存配置
         */
        if (isset(self::$conf[$file])) {
            return self::$conf[$file][$name];
        } else {
            $path = FR_DIR . '\core\config\\' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                if (isset($conf[$name])) {
                    self::$conf[$file] = $conf; //缓存配置
                    return $conf[$name];
                } else {
                    throw new \Exception("配置不存在" . $name);
                }
            } else {
                throw new \Exception("找不到配置文件" . $file);
            }
        }
    }
    public static function getAll($file)
    {
        if (isset(self::$conf[$file])) {
            return self::$conf[$file];
        } else {
            $path              = FR_DIR . '\core\config\\' . $file . '.php';
            $conf              = include $path;
            self::$conf[$file] = $conf; //缓存配置
            return $conf;

        }
    }
}
