<?php

trait A {

    public $name = 'A';

    public function sayHello() {
        echo "Hello trait\n";
    }
    public function sayHi() {
        echo "Hi trait\n";
    }
}
class B {
    public function sayHello() {
        echo "Hello class\n";
    }
    public function sayHi() {
        echo "Hi class\n";
    }
}
class C extends B {
    use A;
    public function sayHello() {
        echo "Hello C\n";
    }
}
$c = new C();
$c->sayHello();
$c->sayHi();
echo $c->name."\n";