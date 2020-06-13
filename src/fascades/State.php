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
    
         $i = new $class((new \compiled\project())->dir);
         
         return $i;
    }
    
    

   
}
