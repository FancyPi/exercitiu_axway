<?php

namespace App\Components;

use App\Skill;
use App\User;

class GetAllSkills
{

  public static function execute(){
    #get all skills
    $skills = Skill::all();

    #init array of skills
    $arr  = [];

    #add the skills to the arr
    foreach($skills as $skill){

      $arr[$skill->id] = $skill->name;
    }


    #return the arr
    return $arr;
  }

}
