<?php

use App\Components\GetAllSkills;

?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      <div class="col-lg-6">

        <div class="h1"><a href="{{route('users.index')}}">Users</a> </div>

      </div>

      <div class="col-lg-6">
        {!! Form::open(['url' => route('users.index'), 'method' => 'GET']) !!}
        <div class=" mb-2">
          <div class="h5 mr-2" style="display:inline-block">
            Sort by Skill
          </div>
          {!! Form::select('skill', GetAllSkills::execute(), 0, ['class' => 'form-control col-lg-3', 'style' => 'display:inline-block']) !!}
          {!! Form::submit('Sort', ['class'=>'btn btn-warning col-lg-3', 'style' => 'display:inline-block']) !!}

        </div>

        {!! Form::close() !!}
      </div>


      <div class="col-lg-12">
        <table class="table table-striped table-bordered">
          <thead>
            <th>
              ID / Matricola
            </th>
            <th>
              Name
            </th>
            <th>
              Email
            </th>
            {{-- If there was a given skill, show the skill level --}}
            @if($flag_show_level)
              <th>
                Skill Level
              </th>
            @endif
            <th>
              Created
            </th>
            <th>
              Updated
            </th>
          </thead>
          <tbody>

            @if(isset($users))
              @foreach($users as $user)

                <tr>
                  <td>
                    {{$user->id}}
                  </td>
                  <td>
                    <a href="{{route('users.show', ['user' => $user->id])}}">{{$user->name}}</a>
                  </td>
                  <td>
                    {{$user->email}}
                  </td>
                  {{-- If there was a given skill, show the skill level --}}
                  @if($flag_show_level)
                    <td>
                      {{  $user->skills->find($skill)->pivot->level}}
                    </td>
                  @endif
                  <td>
                    {{$user->created_at}}
                  </td>
                  <td>
                    {{$user->updated_at}}
                  </td>
                </tr>

              @endforeach
            @else

              No Users Found

            @endif



          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
