@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      <div class="col-lg-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('levels.index')}}">Levels</a></li>
          <li class="breadcrumb-item active">Show</li>
        </ol>
      </div>

      <div class="col-lg-12">
        <div class='h1'>
          {{$level->name}}
          {!! Form::open(['url' => route('levels.destroy', ['level' => $level->id]), 'method' => 'DELETE', 'style' => 'display:inline-block']) !!}
          {!! Form::token() !!}
          <a href="{{ route('levels.edit', ['level' => $level->id]) }}" class="btn btn-info ml-2">Edit</a>
          {!! Form::submit('DELETE', ['class' => 'btn btn-danger']) !!}

          {!! Form::close() !!}
        </div>
      </div>

      <div class="col-lg-4">
        <ul class="list-group">
          <li class="list-group-item">ID: {{$level->id}}</li>
          <li class="list-group-item">Name: {{$level->name}}</li>
          <li class="list-group-item">Created: {{$level->created_at}}</li>
          <li class="list-group-item">Updated: {{$level->updated_at}}</li>
        </ul>
      </div>
    </div>
</div>
@endsection
