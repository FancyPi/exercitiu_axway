<?php

use App\Components\ReturnLevelName;
use App\Components\CreateChartData;

?>

@extends('layouts.app')

@section('content')
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div class="container">
    <div class="row">

      <div class="col-lg-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
          <li class="breadcrumb-item active">Show</li>
        </ol>
      </div>

      <div class="col-lg-12">
        <div class='h1'>
          {{$user->name}}

        </div>
      </div>

      <div class="col-lg-4">
        <div class="h2">
          Info
        </div>
        <ul class="list-group">
          <li class="list-group-item">ID: {{$user->id}}</li>
          <li class="list-group-item">Name: {{$user->name}}</li>
          <li class="list-group-item">Email: {{$user->email}}</li>
          <li class="list-group-item">Created: {{$user->created_at}}</li>
          <li class="list-group-item">Updated: {{$user->updated_at}}</li>
        </ul>
      </div>


      <div class="col-lg-8">
        <div class="h2">
          Skills  <a href="{{route('users.assign', ['user' => $user->id])}}"><i class="fa fa-plus"></i></a>
        </div>
          @if($user->skills)
            <table class="table table-bordered table-striped">
              <thead>
                <th>
                  Skill
                </th>
                <th>
                  Current Level
                </th>
                <th>
                  Next Level
                </th>
                <th>
                  Action
                </th>
              </thead>
              <tbody>
                @foreach ($user->skills as $skill)
                  <tr>
                   <td>
                     {{$skill->name}}
                   </td>
                   <td>
                     {{ReturnLevelName::execute($skill->pivot->level)}}
                    </td>
                    <td>
                    {{ReturnLevelName::execute($skill->pivot->level + 1)}}
                     </td>
                     <td>
                       @if($skill->pivot->level < 5)
                         <a href="{{route('users.advance', ['user' => $user->id, 'skill' => $skill->id])}}" class="btn btn-light">Advance</a>

                       @else

                         No action available

                       @endif

                     </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

          @else
            <ul class="list-group">
              <li class="list-group-item">No skills yet.</li>
            </ul>
          @endif
      </div>



      <div class="col-lg-12 mt-5 row">
        <div class="h2 col-lg-12">
          Skills  History
        </div>
        @foreach($user->skills as $skill)
        <div class="col-lg-6">
            <div class="h2">
                {{$skill->name}}
            </div>
            <div id="curve_chart_{{$skill->id}}" style="width: 700px; height: 500px"></div>

              {{-- Chart JS --}}
                <script type="text/javascript">
                  google.charts.load('current', {'packages':['corechart']});
                  google.charts.setOnLoadCallback(drawChart);

                  function drawChart() {
                    // Here in arrayToDataTable we call the PHP class that we created to get the data from
                    // The histories table and based on that information to create a chart
                    // which shows the user learning performance/development
                    var data = google.visualization.arrayToDataTable({{CreateChartData::execute($user->id, $skill->id)}});

                    var options = {
                      title: 'Learning Performance',
                      curveType: 'function',
                      legend: { position: 'bottom' },
                      pointSize: 9,
                      width: 650,
                      height: 450,
                      bar: {groupWidth: '95%'},
                      vAxis: { gridlines: { count: 4 } }
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart_{{$skill->id}}'));

                    chart.draw(data, options);
                  }
                </script>
        </div>
        @endforeach
      </div>
    </div>
</div>
@endsection
