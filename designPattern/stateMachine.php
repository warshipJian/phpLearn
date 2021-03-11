<?php

class State
{
    public $state;

    public function __construct($status){
        $this->state = $status;
    }

    public function  handle($obj)
    {
        $obj->setState($this->state);
    }
}

class Context
{
    public function __construct()
    {
        $this->state = null;
    }

    public function getState()
    {
        return $this->state."\n";
    }

    public function setState($state)
    {
        $this->state = $state;
    }
}

$context = new Context();
$green = new State('green');
$yellow = new State('yellow');
$red = new State('red');
$green->handle($context);
echo $context->getState();
$yellow->handle($context);
echo $context->getState();
$red->handle($context);
echo $context->getState();
