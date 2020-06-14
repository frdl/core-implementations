<?php

namespace frdl;

use frdl\core\Facade;


class App extends Facade
{

    protected static $shouldBeSingleton = true;

    protected static function getFacadeAccessor() :string
    {
         self::_init();  
         return \frdl\runtime\App::class;
    }
    
    
    protected static function getFacadeInstance(string $env=null,string $dir=null)
    {
        
        self::_init();  
        
        $class = static::getFacadeAccessor();
    
      if(!is_string($dir) ){
        $dir = (class_exists(\compiled\project::class))
              ? (new \compiled\project())->dir
          
            : __DIR__.\DIRECTORY_SEPARATOR
              .'..'.\DIRECTORY_SEPARATOR
              .'..'.\DIRECTORY_SEPARATOR
              .'..'.\DIRECTORY_SEPARATOR
              .'..'.\DIRECTORY_SEPARATOR
              .'..'.\DIRECTORY_SEPARATOR
              ;
      }
      
      if(!is_dir($dir) ){
        throw new \Exception('Application directory "'.$dir.'" does not exist');
      }
      
       if(!is_string($env) ){
          $env = (getenv('APP_ENV'))
                ? getenv('APP_ENV')
                : 'production';
       }
      
        // $i = new $class($env, $dir);
           $i = $class::getInstance($env, $dir);
         return $i;
    }
    
    

   
}
