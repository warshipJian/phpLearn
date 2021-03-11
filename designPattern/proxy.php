<?php

class CD {
    public function buy($title){
        return '来香港CD商店购买： '.$title."\n";
    }
}

class Proxy {
    public function buy($title){
        $cd = new CD();
        return $cd->buy($title.' 通过代理');
    }
}

$p = new Proxy();
echo $p->buy('醒着做梦');
$a = new CD();
echo $a->buy('吻别');


// mysql读写分离
class DB {

    public function __construct()
    {
    }


    private static function read($sql){
        echo "read sql: ".$sql."\n";
    }

    private static function write($sql){
        echo "write sql: ".$sql."\n";
    }

    public static function proxy($sql){
        if (substr($sql, 0, 6) == 'select'){
            self::read($sql);
        } elseif (substr($sql,0,6 == 'update')){
            self::write($sql);
        } else{
            echo "sql not support: ".$sql;
        }
    }
}

DB::proxy('select * from user;');