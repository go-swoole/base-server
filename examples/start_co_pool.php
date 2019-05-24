<?php

use ESD\CoServer\Coroutine\Co;
use ESD\CoServer\Coroutine\CoPoolFactory;
use ESD\CoServer\Coroutine\Pool\Runnable;

require __DIR__ . '/../vendor/autoload.php';
enableRuntimeCoroutine();

/**
 * 用连接池执行任务
 * Class Task
 */
class Task extends Runnable
{
    private $max;

    public function __construct($max)
    {
        parent::__construct(false);
        $this->max = $max;
    }

    function run()
    {
        sleep($this->max);
        print_r("[" . Co::getCid() . "]\tRunnable执行完毕\n");
        return $this->max;
    }
}

goWithContext(function () {
    $pool = CoPoolFactory::createCoPool("Executor-1", 5, 10, 1);
    for ($i = 0; $i < 10; $i++) {
        $task = new Task(2);
        $pool->execute($task);
        $pool->execute(function () {
            print_r("[" . Co::getCid() . "]\t执行完毕\n");
        });
    }
});
