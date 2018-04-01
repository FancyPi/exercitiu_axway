<?php

use App\Components\CreateSkillArray;
use App\Components\CreateLevelArray;

?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      <div class="col-lg-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.show', ['user' => $user->id])}}">{{$user->name}}</a></li>
                <li class="breadcrumb-item active">Assign Skill</li>
              </ol>
      </div>


      <div class="col-lg-12">
        <div class='h1'>Assign Skill {{ $user->name }}</div>
      </div>

      <div class="col-lg-4">
              {!! Form::open(['url' => route('users.assign', ['user' => $user->id]), 'method' => 'POST']) !!}

              {!! Form::token();  !!}

              <div class="form-group">
                {!! Form::label('name', 'Name', ['class' => ''])  !!}
                {!! Form::select('skill', CreateSkillArray::execute($user->id), 0,['class' => 'form-control']) !!}
              </div>

              <div class="form-group">
                {!! Form::label('name', 'Name', ['class' => ''])  !!}
                {!! Form::select('level', CreateLevelArray::execute(), 0,['class' => 'form-control']) !!}
              </div>
              <button type="Create" class="btn btn-primary">Add</button>
              {!! Form::close() !!}
      </div>
    </div>
</div>
@endsection
