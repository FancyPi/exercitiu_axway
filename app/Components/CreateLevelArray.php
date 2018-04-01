<?php

namespace App\Components;

use App\Level;

class CreateLevelArray
{

  public static function execute(){
    #Get all Levels
    $levels = Level::all();

    #Init Array
    $arr = [];

    #Add all levels to the array
    foreach($levels as $level){

      $arr[$level->id] = $level->name;

    }

    #return the array
    return $arr;
  }

}
