@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
            <div class="card-header">Admin</div>
            <div class="card-body">
              <a href="{{route('skills.index')}}" class="btn btn-light" >Skills</a>

              <a href="{{route('levels.index')}}" class="btn btn-light">Levels</a>

              <a href="#" class="btn btn-light">Users</a>
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                You are logged in!
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
