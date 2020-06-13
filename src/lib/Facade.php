<?php
namespace frdl\core;

abstract class Facade
{
    private static $instances = array();
    private static $corified = false;

  

    abstract protected static function getFacadeAccessor() :string;
    
    
    public static function getFacadeInstance()
    {
        $class = static::getFacadeAccessor();
    
         $i = new $class();
         
         return $i;
    }
    
    
    final public static function __callStatic($method, $arguments)
    {
        if(false === self::$corified){
            self::$corified=true;
            new \Frdlweb\Corify;
        }
        
        
        if (!isset(self::$instances[$connector])) {
            self::$instances[$connector] = static::getFacadeInstance();
        }
        return call_user_func_array(array(self::$instances[$connector], $method), $arguments);
    }   
   
}
