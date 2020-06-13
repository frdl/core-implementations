<?php

namespace Project;

use frdl\core\Facade;


class State extends Facade
{

  

    protected static function getFacadeAccessor() :string
    {
         return \frdl\ProjectState::class;
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
      
         $i = new $class($dir);
         
         return $i;
    }
    
    

   
}
