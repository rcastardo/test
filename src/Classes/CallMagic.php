<?php
/**
 * Created by PhpStorm.
 * User: rcastardo
 * Date: 23/05/14
 * Time: 17:11
 */

namespace ReginaldoTeste\Classes;

class CallMagic
{
    public $properties = array();

    public function __construct($className = null)
    {
        $reflectionClass = new ReflectionClass((($className === null) ? $this : $className));
        $propertyArray = $reflectionClass->getProperties();
        foreach ($propertyArray as $property) {
            $this->properties[] = $property->getName();
        }
        return $this->properties;
    }

    public function __call($method, $arguments = null)
    {
        $methodType = substr($method, 0, 3);
        $propertyName = strtolower(substr($method, 3, 1)) . substr($method, 4);
        if ($methodType === 'set') {
            $this->$propertyName = $arguments[0];
            return $this;
        } elseif ($methodType === 'get') {
            return $this->$propertyName;
        } else {
            throw new InvalidArgumentException(utf8_decode('O método ' . __CLASS__ . '::' . $method . '() não existe!'));
        }
    }

    public function returnReflectionClass($class = null)
    {
        if ($class !== null) {
            return new ReflectionClass($class);
        } else {
            return new ReflectionClass(get_called_class());
        }
    }

    public function toString($class = null)
    {
        return self::returnReflectionClass($class)->__toString();
    }
}
