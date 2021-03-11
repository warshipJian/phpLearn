<?php
abstract class A
{
    /** 抽象类中可以定义变量 */
    protected $value1 = 0;
    private $value2 = 1;
    public $value3 = 2;
    /** 也可以定义非抽象方法 */
    public function my_print()
    {
        return "hello,world\n";
    }
    /**
     * 大多数情况下，抽象类至少含有一个抽象方法。抽象方法用abstract关键字声明，其中不能有具体内容。
     * 可以像声明普通类方法那样声明抽象方法，但是要以分号而不是方法体结束。也就是说抽象方法在抽象类中不能被实现，也就是没有函数体“{some codes}”。
     */
    abstract protected function abstract_func1();
    abstract protected function abstract_func2();
}
abstract class B extends A
{
    public function abstract_func1()
    {
        echo "implement the abstract_func1 in class A/n";
    }
    /** 这么写在zend studio 8中会报错*/
    // abstract protected function abstract_func2();
}
class C extends B
{
    public function abstract_func2()
    {
        echo "implement the abstract_func2 in class A/n";
    }
}

$a = new C();
echo $a->my_print();

/*
 *
 * 抽象类和接口：
 *   1. 抽象类中可以写具体实现的方法，接口只能定义方法名，不能有具体的实现
 *   2. 子类如要继承抽象类里的抽象方法，则子类也要是抽象类，用abstract关键字
 *   3. 接口可以继承多个，用implement关键字，抽象类可以理解为类的一种，只能继承一个，用extands关键字
 *   4. 在实际使用中，抽象类关注的是类之间的继承关系，接口关注的是类的属性
 *
 * 抽象类用途：
 *   比如有的情况下，某个类需要定义一些固定的方法，又需要提供一些缺省的方法时，可以用抽象类。
 *
 *
 *
 */