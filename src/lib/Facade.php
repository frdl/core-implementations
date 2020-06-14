<?php
namespace frdl\core;

abstract class Facade
{
    private static $instances = array();
    private static $corified = false;
    protected static $shouldBeSingleton = true;
    
	
    abstract protected static function getFacadeAccessor() :string;    
    

    protected static function singleton(bool $is = null) :bool{
		 if(\is_bool($is)){
		    self::$shouldBeSingleton=$is;	 
		 }	 
	  
       return  self::$shouldBeSingleton;	 
    }
    
    
    public static function create()
    {
        if(self::singleton() && isset(self::$instances[static::getFacadeAccessor()])){
            return self::$instances[static::getFacadeAccessor()];
        }
        
       self::$instances[static::getFacadeAccessor()] 
            = call_user_func_array(static::class.'::getFacadeInstance', func_get_args());
        
        return self::$instances[static::getFacadeAccessor()];
    }       
    
    protected static function getFacadeInstance() 
    {
        $class = static::getFacadeAccessor();
    
         $i = new $class();
         
         return $i;
    }
    
    final public function __set($name, $value)
    {
        self::$instances[ static::getFacadeAccessor() ]->{$name} = $value;
    }   
        
    final public function &__get($name)
    {
        return self::$instances[ static::getFacadeAccessor() ]->{$name};
    }   
    
    
    final public function __call($method, $arguments)
    {
        return call_user_func_array([self::$instances[ static::getFacadeAccessor() ], $method], $arguments);
    }   
    
    
    final public static function __callStatic($method, $arguments)
    {
        if(false === self::$corified){
            self::$corified=true;
            new \Frdlweb\Corify;
        }
        
        
        if (!isset(self::$instances[static::getFacadeAccessor()])) {
            self::$instances[static::getFacadeAccessor()] = static::getFacadeInstance();
        }
        return call_user_func_array([self::$instances[static::getFacadeAccessor()], $method], $arguments);
    }   
   
}
