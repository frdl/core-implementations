<?php

namespace frdl;

use frdl\core\Facade;


class App extends Facade
{

  

    protected static function getFacadeAccessor() :string
    {
         return \frdlweb\Level2App::class;
    }
    
    
    public static function getFacadeInstance()
    {
        $class = static::getFacadeAccessor();
    
        $dir = (class_exists(\compiled\project::class))
              ? (new \compiled\project())->dir
          
            : __DIR__.\DIRECTORY_SEPARATOR
              .'..'.\DIRECTORY_SEPARATOR
              .'..'.\DIRECTORY_SEPARATOR
              .'..'.\DIRECTORY_SEPARATOR
              .'..'.\DIRECTORY_SEPARATOR
              .'..'.\DIRECTORY_SEPARATOR
              ;
      
          $env = (getenv('APP_ENV'))
                ? getenv('APP_ENV')
                : 'production';
      
         $i = new $class($env, $dir);
         
         return $i;
    }
    
    

   
}
