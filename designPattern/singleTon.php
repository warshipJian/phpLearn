<?php

class redisTest {

    private function __construct(){

    }

    private function __clone(){

    }

    public static $single;

    public static function getInstance(){
        if (!self::$single){
            self::$single = new self();
        }
        return self::$single;
    }

    public function get(){
        return 'redis get';
    }

    public function set(){
        return 'redis set';
    }
}

$r = redisTest::getInstance();
echo $r->set();