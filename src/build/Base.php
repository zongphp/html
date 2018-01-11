<?php
namespace zongphp\html\build;

use zongphp\request\Request;

/**
 * 创建静态
 * Class Base
 *
 * @package zongphp\html\build
 */
class Base
{
    /**
     * 生成静态
     *
     * @param array $action
     * @param array $args
     * @param       $file
     *
     * @return bool
     */
    public function make(array $action, array $args, $file)
    {
        foreach ($args as $k => $v) {
            Request::set('get.'.$k, $v);
        }
        ob_start();
        call_user_func_array([new $action[0], $action[1]], []);
        $data = ob_get_clean();
        //目录检测
        if ( ! is_dir(dirname($file))) {
            mkdir(dirname($file), 0755, true);
        }

        //创建静态文件
        return file_put_contents($file, $data) !== false;
    }
}
