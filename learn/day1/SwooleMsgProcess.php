<?php
/**
 * Created by PhpStorm.
 * User: guoyuanjian
 * Date: 2018/5/1
 * Time: 下午8:04
 */


class SwooleMsgProcess
{
    public function online($process, $ws)
    {
        var_dump($process);
        $ws->tick(10000, function() use ($ws) {
            $num = rand(1000,9999);
            foreach($ws->connections as $fd) {
                $ws->push($fd, 'hello '.$num);
            }
        });
    }
}