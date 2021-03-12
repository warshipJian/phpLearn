<?php
/*
 *  将依赖通过参数的方式从外部传入(即依赖注入)，
 *  控制的角度上依赖的产生从主动创建变为被动注入，
 *  依赖关系变为了依赖于抽象接口而不依赖于具体实现。
 *
 */

class Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        // 不创建依赖，变成依赖注入
        $this->service = $service;
        echo $this->service->count;
    }
}

class Service
{
    protected $model;
    public $count;

    public function __construct(Model $model,$param1, $param2)
    {
        $this->count = $param1 + $param2;
        // 不创建依赖，变成依赖注入
        $this->model = $model;
    }
}

class Model
{
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
    }
}

$model = new Model('users');
$service = new Service($model,3,4);
$controller = new Controller($service);

