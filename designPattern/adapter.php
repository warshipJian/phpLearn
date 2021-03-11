<?php

trait Player {
    public static function music($name,$filepath) {
        return 'play muisc '.$name.' in path '.$filepath."\n";
    }
}

trait Mp3Player {
    public static function music($name){
        $filepath = '/opt/music';
        return 'mp3 play muisc '.$name.' in path '.$filepath."\n";
    }
}

class AdapterPlayer {
    use Player,Mp3Player;
    public static function music($name,$filepath=null){
        if($filepath){
            return Player::music($name,$filepath);
        }else{
            return Mp3Player::music($name);
        }
    }
}

echo AdapterPlayer::music('haha');
echo AdapterPlayer::music('haha','/home/music');