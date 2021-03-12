<?php
class Student {
    private   $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    protected function getName()
    {
        return $this->name;
    }
}

$stu = new Student();
$ref = new ReflectionClass(Student::class);
$method = $ref->getMethod('setName');
$method->invoke($stu, 'john');
$prop = $ref->getProperty('name');
$prop->setAccessible(true);
$val = $prop->getValue($stu);
echo $val;