<?php

use Core\Coroutine\Co;
use Core\Coroutine\Pool\Runnable;

require __DIR__ . '/../vendor/autoload.php';
\Core\Utils\Utils::enableRuntimeCoroutine();

/**
 * 执行任务
 * Class Task
 */
class Task extends Runnable
{
    private $max;

    public function __construct($max)
    {
        parent::__construct(true);
        $this->max = $max;
    }

    function run()
    {
        sleep($this->max);
        print_r("[" . Co::getCid() . "]\tRunnable执行完毕\n");
        return $this->max;
    }
}

go(function () {
    $task = new Task(2);
    $task->justRun();
    print_r("结果->" . $task->getResult() . "\n");
});