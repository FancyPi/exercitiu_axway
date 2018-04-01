<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillHistory extends Model
{

  protected $fillable = [
      'user_id', 'skill_id', 'current_skill_level', 'next_skill_level',
  ];



}
