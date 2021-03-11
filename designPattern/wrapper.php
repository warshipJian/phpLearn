<?php

function zsq($func){
    $wrapper = function () use($func) {
        print_r('---start---'."\n");
        $func();
        print_r('---end---'."\n");
    };
    return $wrapper;
}

$a = function(){
    print_r('xx'."\n");
};

$c = zsq($a);
$c();