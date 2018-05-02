<?php
/**
 * Created by PhpStorm.
 * User: guoyuanjian
 * Date: 2018/4/30
 * Time: 下午11:06
 */

/*
class Client
{
    private $client;

    public function __construct()
    {
        $this->client = new swoole_client(SWOOLE_SOCK_TCP);
    }

    public function connect()
    {
        if(!$this->client->connect("127.0.0.1",9501,10))
        {
            echo "Error: {$this->client->errMsg}[{$this->client->errCode}]\n";
        }

        fwrite(STDOUT,"请输入消息 Please input msg: ");
        $msg = trim(fgets(STDIN));

        $this->client->send($msg);

        $message = $this->client->recv();
        echo "Get Message From Server:{$message}\n";
    }
}
$client = new Client();
while (1){
    $client->connect();
    sleep(5);
}
*/

$cli = new swoole_http_client('127.0.0.1',9501);

$cli->on('message',function ($_cli,$frame){
    var_dump($frame);
});

$cli->upgrade('/',function ($cli){
    $data['channel'] = 'order';
    $data_str = json_encode($data);
    $cli->push($data_str);
});