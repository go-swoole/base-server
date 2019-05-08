<?php
/**
 * Created by PhpStorm.
 * User: administrato
 * Date: 2019/5/8
 * Time: 9:19
 */

namespace GoSwoole\Plugins\Session;


use GoSwoole\BaseServer\Server\Beans\Request;

class RequestProxy
{
    public function __get($name)
    {
        return getDeepContextValueByClassName(Request::class)->$name;
    }

    public function __set($name, $value)
    {
        getDeepContextValueByClassName(Request::class)->$name = $value;
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([getDeepContextValueByClassName(Request::class), $name], $arguments);
    }
}