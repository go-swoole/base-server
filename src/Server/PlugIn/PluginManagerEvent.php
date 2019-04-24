<?php
/**
 * Created by PhpStorm.
 * User: 白猫
 * Date: 2019/4/19
 * Time: 16:12
 */

namespace GoSwoole\BaseServer\Server\Plugin;


use GoSwoole\BaseServer\Plugins\Event\Event;

class PluginManagerEvent extends Event
{
    const PlugBeforeServerStartEvent = "PlugBeforeServerStartEvent";
    const PlugBeforeProcessStartEvent = "PlugBeforeProcessStartEvent";
    const PlugAllReadyEvent = "PlugAllReadyEvent";
}