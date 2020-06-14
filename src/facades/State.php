<?php

namespace Webfan\Project;

use frdl\core\Facade;


class State extends Facade
{

  

    protected static function getFacadeAccessor() :string
    {
         return \Webfan\Support\Project\State::class;
    }
    
    
    protected static function getFacadeInstance(string $dir = null)
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
      

      
         $i = new $class($dir);
         
         return $i;
    }
    
    

   
}
