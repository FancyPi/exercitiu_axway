<?php

namespace App\Components;

use App\Level;

class ReturnLevelName
{

  public static function execute($id){


    #if the id given is not in range of all levels go to else;
    if($id <= count(Level::all()) && $id > 0){

          #Get the level
          $level = Level::find($id);

          #set the level name;
          $name =  $level->name;

    }else{
      if($id <= 0){
        #level had no data before
        ##This was fixed in a future update
        $name = 'no previus data';
      }else{
        #level is max which means it cannot go forward
        $name = 'none, level is max';
      }

    }

    return $name;
  }

}
