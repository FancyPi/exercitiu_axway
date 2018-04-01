@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      <div class="col-lg-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('skills.index')}}">Skills</a></li>
                <li class="breadcrumb-item"><a href="{{route('skills.show', ['skill' => $skill->id])}}">{{$skill->name}}</a></li>
                <li class="breadcrumb-item active">Edit</li>
              </ol>
      </div>


      <div class="col-lg-12">
        <div class='h1'>Edit {{ $skill->name }}</div>
      </div>

      <div class="col-lg-4">
              {!! Form::open(['url' => route('skills.update', ['skill' => $skill->id]), 'method' => 'PUT']) !!}

              {!! Form::token();  !!}

              <div class="form-group">
                {!! Form::label('name', 'Name', ['class' => ''])  !!}
                {!! Form::text('name', $skill->name,['class' => 'form-control']) !!}
              </div>
              <button type="Create" class="btn btn-primary">Update</button>
              {!! Form::close() !!}
      </div>
    </div>
</div>
@endsection
