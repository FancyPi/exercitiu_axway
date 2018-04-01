<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name',
  ];

  #belongsToMany Relationship
  public function users(){
    return $this->belongsToMany('App\User', 'user_skill');
  }
}
