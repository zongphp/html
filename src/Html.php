<?php
namespace zongphp\html;

use zongphp\html\build\Base;

class Html
{
    protected static $link;

    protected function driver()
    {
        self::$link = new Base();

        return $this;
    }

    public function __call($method, $params)
    {
        if (is_null(self::$link)) {
            $this->driver();
        }

        return call_user_func_array([self::$link, $method], $params);
    }

    public static function single()
    {
        static $link;
        if (is_null($link)) {
            $link = new static();
        }

        return $link;
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([static::single(), $name], $arguments);
    }
}
