<?php

use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('skills')->insert([
          [
            'name' => 'PHP',

          ],
          [
            'name' => 'UNIX',

          ],
          [
            'name' => 'JavaScript',

          ],
          [
            'name' => 'Lb. Engleza',

          ],
          [
            'name' => 'Lb. Germana',

          ]
      ]);

    }
}
