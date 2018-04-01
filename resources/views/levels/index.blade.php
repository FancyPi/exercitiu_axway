@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      <div class="col-lg-12">

        <div class="h1">Levels <a href="{{ route('levels.create') }}" class="btn btn-success ml-2">New Level</a></div>

      </div>


      <div class="col-lg-12">
        <table class="table table-striped table-bordered">
          <thead>
            <th>
              ID
            </th>
            <th>
              Name
            </th>
            <th>
              Created
            </th>
            <th>
              Updated
            </th>
          </thead>
          <tbody>

            @foreach($levels as $level)

              <tr>
                <td>
                  {{$level->id}}
                </td>
                <td>
                  <a href="{{route('levels.show', ['level' => $level->id])}}">{{$level->name}}</a>

                </td>
                <td>
                  {{$level->created_at}}
                </td>
                <td>
                  {{$level->updated_at}}
                </td>
              </tr>

            @endforeach

          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
