@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      <div class="col-lg-12">

        <div class="h1">Skills <a href="{{ route('skills.create') }}" class="btn btn-success ml-2">New Skill</a></div>

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

            @foreach($skills as $skill)

              <tr>
                <td>
                  {{$skill->id}}
                </td>
                <td>
                  <a href="{{route('skills.show', ['skill' => $skill->id])}}">{{$skill->name}}</a>

                </td>
                <td>
                  {{$skill->created_at}}
                </td>
                <td>
                  {{$skill->updated_at}}
                </td>
              </tr>

            @endforeach

          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
