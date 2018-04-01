@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      <div class="col-lg-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('skills.index')}}">Skills</a></li>
                <li class="breadcrumb-item active">Create</li>
              </ol>
      </div>


      <div class="col-lg-12">
        <div class='h1'>Create a new Skill</div>
      </div>

      <div class="col-lg-4">
              {!! Form::open(['url' => route('skills.store'), 'method' => 'POST']) !!}

              {!! Form::token();  !!}

              <div class="form-group">
                {!! Form::label('name', 'Name', ['class' => ''])  !!}
                {!! Form::text('name', '',['class' => 'form-control']) !!}
              </div>
              <button type="Create" class="btn btn-primary">Submit</button>
              {!! Form::close() !!}
      </div>
    </div>
</div>
@endsection
