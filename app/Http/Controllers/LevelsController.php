<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;


class LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $levels = Level::all();

      return view('levels.index', [
        'levels' => $levels
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('levels.create');
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

      $level = new Level();

      $level->name = $name;


      if($level->save()){
        flash('New Level Created Successfully!')->success();

      }else{
        flash('An error occurred!')->error();

      }

      return redirect(route('levels.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $level =  Level::find($id);

      return view('levels.show', [
        'level' => $level
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

      $level = Level::find($id);

      return view('levels.edit', ['level' => $level]);

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

        $level = Level::find($id);

        $level->name = $name;

        if($level->save()){
          flash('Level updated Succesfully!')->info();
        }else{
          flash('Error occurred while updating!')->error();
        }
        return redirect(route('levels.show', ['level' => $level->id]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      Level::destroy($id);

      flash('Level Deleted!')->error();

      return redirect(route('level.index'));

    }
}
