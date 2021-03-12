<?php

require_once './Container.php';

class A
{
    public $count = 80;
}

class B
{
    protected $count = 1;

    public function __construct(A $a, $count)
    {
        $this->count = $a->count + $count;
    }

    public function getCount()
    {
        return $this->count;
    }
}

$b = Container::getInstance('B', [10,20,80]);
if($b){
    echo $b->getCount();
}else{
    echo 'no';
}