<?php
/*
 *  DIP
 *  一个原则 程序要依赖于抽象接口，不要依赖于具体实现
 *
 *  IOC
 *  该原则的一个方案
 *
 *  DI
 *  该方案的一种实现方式
 *
 */

class Controller
{
    protected $service;

    public function __construct()
    {
        // 主动创建依赖
        $this->service = new Service(12, 13);
    }
}

class Service
{
    protected $model;
    protected $count;

    public function __construct($param1, $param2)
    {
        $this->count = $param1 + $param2;
        // 主动创建依赖
        $this->model = new Model('test_table');

        echo $this->count;
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

$controller = new Controller;

