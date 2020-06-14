<?php

namespace frdl;

use frdl\core\Facade;

class Container extends Facade
{
    protected static $shouldBeSingleton = true;
    protected static function getFacadeAccessor() :string
    {
           return \compiled\CompiledContainer::class;
    }
    
    public static function set($key, $value){
      throw new \Exception(sprintf('runtime parameters setter is not implemented yet in %s', __METHOD__));
    }
 }
