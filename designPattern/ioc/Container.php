<?php
/*
 *  在ioc2中实现了解耦，但还是要手动创建类，然后注入
 *  能否自动创建这些类呢？比如用工厂模式。
 *
 *   PHP 反射
 *
 */

class Container
{
    public static function getInstance($class_name, $params = [])
    {
        // 类反射
        $reflector = new \ReflectionClass($class_name);
        // 检查类是否有构造函数 __construct
        $constructor = $reflector->getConstructor();
        if ($constructor) {
            $di_params = [];
            // 获取构造类时传入的所有参数
            $classParams = $constructor->getParameters();
            foreach ($classParams as $param) {
                // 传入的是否为类
                $class = $param->getClass();
                if ($class) {
                    $di_params[] = new $class->name;
                }
            }
            $di_params = array_merge($di_params, $params);
            // 返回构造类
            return $reflector->newInstanceArgs($di_params);
        }else{
            throw new Exception("obj must have constructor");
        }
    }
}
