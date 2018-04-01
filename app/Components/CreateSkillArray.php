<?php

namespace App\Components;

use App\Skill;
use App\User;
class CreateSkillArray
{

  public static function execute($user_id){
    #Get all the skills
    $skills = Skill::all();

    #Get the use model
    $user = User::find($user_id);

    #Skills that user has
    $user_skills = $user->skills;


    #init array for the skills the user already has
    $skills_array = [];

    #rearrange the way the skills look like
    foreach($user_skills as $skill){
      $skills_array[] = $skill->id;
    }

    #array which will return all skils that the user does NOT have
    $arr = [];

    #iterate the all skills
    foreach($skills as $skill){

      #if the user has the skill, jump to the next one
      if(in_array($skill->id, $skills_array)){
        continue;
      }
      #add the skill to the array
      $arr[$skill->id] = $skill->name;
    }

    #return the arr
    return $arr;
  }

}
