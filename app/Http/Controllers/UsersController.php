<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SkillHistory;
use Khill\Lavacharts\Lavacharts;
use App\Skill;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      #flag to see if we should show the level of the given skill
      $flag_show_level = false;

      #init the skill
      $skill = 0;

      #if skill was given it means we need to sort the results
      if($request->input('skill')){
        #get the skill from GET
        $skill = $request->input('skill');

        #Yes we should show the level
        $flag_show_level = true;

        #Get the users who have the skill
        $users = Skill::find($request->input('skill'))->users;

      }else{
        #Skill was not given, which means we show all users without skill
        $users = User::all();
      }

      return view('users.index', [
        'users' => $users,
        'flag_show_level' => $flag_show_level,
        'skill' => $skill
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $user =  User::find($id);

      return view('users.show', [
        'user' => $user,
      ]);

    }

    public function assignSkill($id){

      $user = User::find($id);

      return view('users.assign', [
        'user' => $user
      ]);

    }

    public function assignSkillStore(Request $request, $id){
      #Get the level from Request
      $level = $request->input('level');

      #Get the skill from Request
      $skill = $request->input('skill');

      #Get the user
      $user = User::find($id);

      #Attach the new skill to the user, with the level provided
      $user->skills()->attach($skill, ['level' => $level]);

      #save the data
      $user->save();

      #add a new point in history in which the user advances in skill (
      #it means that you add a new skill to the user and the starting level is the one required
      $user->histories()->create([
          'skill_id' => $skill,
          'current_skill_level' => $level
      ]);

      #redirect to the the user details
      return redirect(route('users.show', ['user' => $user->id]));
    }


    public function advanceSkill($user_id, $skill){

      #get the user
      $user = User::find($user_id);

      #based on the skill given, update the users skill by incrementing the level with 1
      #the level is stored on the pivot table of users and skills
      $user->skills()->updateExistingPivot($skill, ['level' => ($user->skills->find($skill)->pivot->level+1)]);

      #add a new point in history that the user advanced in knowledge in the fiven skill
      $user->histories()->create([
        'skill_id' => $skill,
        'current_skill_level' => $user->skills->find($skill)->pivot->level+1
      ]);

      #redirect to user show
      return redirect(route('users.show', ['user'=> $user_id]));
    }

}
