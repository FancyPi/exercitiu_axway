<?php

namespace App\Components;


use App\User;
use Carbon\Carbon;

class CreateChartData
{

  public static function execute($user_id, $skill_id){

    #Get The User
    $user = User::find($user_id);

    #Init array of histories for chart
    $arr_histories = [];

    #Iterate over the data and create an array
    foreach($user->histories->where('skill_id', $skill_id) as $history){

      $arr_histories[] = [
        'created_at' => $history->created_at,
        'current_skill' => $history->current_skill_level
      ];

    }


    #Init the array for the chart data
    $arr =  [
      ['Date', 'Level']
    ];

    #Add all data to the array for the chart
      foreach($arr_histories as $index => $arr_of_data){

        $arr[] =  [Carbon::parse($arr_of_data['created_at'])->format('d/m/Y h:i'),$arr_of_data['current_skill']];

      }

      #Echo the json for use in JS
     echo json_encode($arr);
  }

}
