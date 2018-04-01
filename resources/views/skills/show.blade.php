@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      <div class="col-lg-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('skills.index')}}">Skills</a></li>
          <li class="breadcrumb-item active">Show</li>
        </ol>
      </div>

      <div class="col-lg-12">
        <div class='h1'>
          {{$skill->name}}
          {!! Form::open(['url' => route('skills.destroy', ['skill' => $skill->id]), 'method' => 'DELETE', 'style' => 'display:inline-block']) !!}
          {!! Form::token() !!}
          <a href="{{ route('skills.edit', ['skill' => $skill->id]) }}" class="btn btn-info ml-2">Edit</a>
          {!! Form::submit('DELETE', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
        </div>
      </div>

      <div class="col-lg-4">
        <ul class="list-group">
          <li class="list-group-item">ID: {{$skill->id}}</li>
          <li class="list-group-item">Name: {{$skill->name}}</li>
          <li class="list-group-item">Created: {{$skill->created_at}}</li>
          <li class="list-group-item">Updated: {{$skill->updated_at}}</li>
        </ul>
      </div>
    </div>
</div>
@endsection
