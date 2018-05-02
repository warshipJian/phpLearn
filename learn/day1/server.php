<?php
/**
 * Created by PhpStorm.
 * User: guoyuanjian
 * Date: 2018/4/30
 * Time: 下午10:57
 */

require_once 'SwooleMsgProcess.php';

$ws = new swoole_websocket_server('0.0.0.0',9501);

$ws->set([
    'worker_num' => 4,
]);

$process = new \swoole_process(function ($process) use ($ws){
    call_user_func_array(array(new SwooleMsgProcess(),'online'),array($process,$ws));
});

$ws->addProcess($process);

$ws->on('open', function ($ws, $request) {
    echo "client-{$request->fd} is connect\n";
    var_dump($request);
});

$ws->on('message', function ($ws, $frame) {
    $ws->push($frame->fd, 'test');
});

$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
});

$ws->start();