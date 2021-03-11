<?php

// 主题
class Order
{
    private $observers = [];

    public function add($observer)
    {
        $this->observers[] = $observer;
    }

    public function notify()
    {
        foreach ($this->observers as $observer){
            $obj = new $observer;
            $obj->update();
        }
    }

    public function create()
    {
        echo "创建了订单\n";
        $this->notify();
    }
}

// 观察者服务
class ObsEmail
{
    public function update()
    {
        echo "发送邮件服务\n";
    }
}

class ObsSms
{
    public function update()
    {
        echo "发送短信服务\n";
    }
}

// 初始化一个主题
$a = new Order();
$a->add('ObsEmail');
$a->add('ObsSms');
// 模拟业务触发
$a->create();