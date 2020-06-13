<?php

namespace Frdlweb;


class Corify
{

   const ALIAS_MAP = [
      \Project\State::class => \Webfan\Project\State::class,
      
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
