<?php

use Illuminate\Database\Seeder;

class LevelsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('levels')->insert([
      [
        'name' => 'cunostinte pur teoretice doar, fara activitati practice.'
      ],
      [
        'name' => 'incepator, junior'
      ],
      [
        'name' => 'confirmat, cu mai multe proiecte la activ'
      ],
      [
        'name' => 'avansat, senior'
      ],
      [
        'name' => 'expert'
      ]
  ]);
  }
}
