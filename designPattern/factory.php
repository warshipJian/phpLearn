<?php

// https://www.jianshu.com/p/f99507e7ab79

// 简单工厂模式
interface Product{
    public function getName();
}

class Car implements Product{
    public function getName(){
        return "汽车";
    }
}

class Apple implements Product{
    public function getName(){
        return "苹果";
    }
}

class SimpleFactory{
    public static function getProduct($type){
        $product = null;
        if ($type == 'car') {
            $product = new Car();
        } elseif ($type == 'apple') {
            $product = new Apple();
        }
        return $product;
    }
}

// 调用简单工厂
// $obj = SimpleFactory::getProduct('apple');
// echo $obj->getName();

// 工厂方法
interface commFactory {
    public function getProduct();
}

class CarFactory implements commFactory {
    public function getProduct()
    {
        return new Car();
    }
}

class AppleFactory implements commFactory {
    public function getProduct()
    {
        return new Apple();
    }
}

// 调用工厂方法
class commClient {
    public static function main(){
        $f = new CarFactory();
        echo $f->getProduct()->getName();
        $f = new AppleFactory();
        echo $f->getProduct()->getName();
    }
}
commClient::main();

// 抽象工厂
interface AbstractFactory {
    public function getProduct();
    public function price();
}

interface Price {
    public function getPrice();
}

class ApplePrice implements Price {
    public function getPrice()
    {
        return 3;
    }
}

class CarPrice implements Price {
    public function getPrice()
    {
        return 300000;
    }
}

class CarAbsFactory implements AbstractFactory {
    public function getProduct()
    {
        return new Car();
    }

    public function price()
    {
        return new CarPrice();
    }
}

class AppleAbsFactory implements AbstractFactory {
    public function getProduct()
    {
        return new Apple();
    }

    public function price()
    {
        return new ApplePrice();
    }
}

class AbsClient {
    public static function main(){
        $client = new self();
        $f = new CarAbsFactory();
        $client->printInfo($f);
    }

    public function printInfo($obj){
        echo $obj->getProduct()->getName().' price: '.$obj->price()->getPrice();
    }
}

AbsClient::main();