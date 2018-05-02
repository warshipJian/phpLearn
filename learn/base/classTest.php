<?php
/**
 * Created by PhpStorm.
 * User: guoyuanjian
 * Date: 2018/5/1
 * Time: 下午9:27
 */

class A
{
    function foo()
    {
        if (isset($this)) {
            echo '$this is defined (';
            echo get_class($this);
            echo ")\n";
        } else {
            echo "\$this is not defined.\n";
        }
        echo foo::class;
    }
}

class B
{
    function bar()
    {
        // Note: the next line will issue a warning if E_STRICT is enabled.
        A::foo();
    }
}

/*
class Test
{
    static public function getNew()
    {
        return new static;
    }
}

class Child extends Test
{

}

$obj1 = new Test();
$obj2 = new $obj1;
var_dump($obj1 !== $obj2);

$obj3 = Test::getNew();
var_dump($obj3 instanceof Test);

$obj4 = Child::getNew();
var_dump($obj4 instanceof Child);
*/

//$a = new A();
//$a->foo();

/*
// Note: the next line will issue a warning if E_STRICT is enabled.
A::foo();
$b = new B();
$b->bar();

// Note: the next line will issue a warning if E_STRICT is enabled.
B::bar();
*/

$instance = new A();

// 也可以这样做：
$className = 'B';
//$instance = new $className(); // Foo()


class MyDestructableClass
{
    function __construct() {
        print "In constructor\n";
        $this->name = "MyDestructableClass";
    }

    function test()
    {
        $this->testC();
        print "test no public,but is public";
    }

    public function testA()
    {
        print "testA is public";
    }

    protected function testB()
    {
        print "testB is protected";
    }

    private function testC()
    {
        print "testC is private";
    }

    function __destruct() {
        print "\nDestroying " . $this->name . "\n";
    }
}

class Htest extends MyDestructableClass
{
    function HtestA()
    {
        self::testB();
    }
}
//$obj = new Htest();
//$obj->HtestA();

interface ai
{
    public function foo();
}

interface gi
{
    public function nb();

    public function ss();
}

interface bi extends ai
{
    public function baz(Baz $baz);
}

// 正确写法
class ci implements bi
{
    public function foo()
    {
    }

    public function baz(Baz $baz)
    {
    }

    public function tt()
    {
        // TODO: Implement tt() method.
    }
}


// 错误写法会导致一个致命错误
/*class di implements gi
{
    public function nb()
    {
    }

    public function ss(Foo $foo)
    {
    }
}*/

class Base {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait SayWorld {
    public function sayHello() {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();