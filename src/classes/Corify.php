<?php

namespace Frdlweb;


class Corify
{

   const ALIAS_MAP = [
       \Webfan\Project\State::class =>  \frdl\Project\State::class,
        \frdlweb\Level2App::class =>  \frdl\runtime\App::class,
   ];
   
   
   
   public function __construct(){
             $this->loadAliasClasses();
   }

   public function loadAliasClasses(){
       foreach(static::ALIAS_MAP as $alias => $realClass){
          \class_alias($realClass, $alias);
       }
   }
}
