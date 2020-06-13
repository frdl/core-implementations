<?php
namespace Frdlweb;

abstract class Facade
{
    private static $instances = array();

  

    abstract protected static function getFacadeAccessor() :string;
    
    
    public static function getFacadeInstance()
    {
        $class = static::getFacadeAccessor();
    
         $i = new $class();
         
         return $i;
    }
    
    
    public static function __callStatic($method, $arguments)
    {
      
        if (!isset(self::$instances[$connector])) {
            self::$instances[$connector] = static::getFacadeInstance();
        }
        return call_user_func_array(array(self::$instances[$connector], $method), $arguments);
    }   
   
}
