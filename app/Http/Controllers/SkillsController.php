<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;


class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $skills = Skill::all();

      return view('skills.index', [
        'skills' => $skills
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $name = $request->input('name');

      $skill = new Skill();

      $skill->name = $name;


      if($skill->save()){
        flash('New Skill Created Successfully!')->success();

      }else{
        flash('An error occurred!')->error();

      }

      return redirect(route('skills.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $skill =  Skill::find($id);

      return view('skills.show', [
        'skill' => $skill
      ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $skill = Skill::find($id);

      return view('skills.edit', ['skill' => $skill]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $name = $request->input('name');

        $skill = Skill::find($id);

        $skill->name = $name;

        if($skill->save()){
          flash('Skill updated Succesfully!')->info();
        }else{
          flash('Error occurred while updating!')->error();
        }
        return redirect(route('skills.show', ['skill' => $skill->id]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      Skill::destroy($id);

      return redirect(route('skills.index'));

    }
}
