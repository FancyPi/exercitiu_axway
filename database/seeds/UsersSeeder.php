<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert(
        [
          [
          'name' => 'Admin',
          'email' => 'admin@admin.com',
          'password' => bcrypt('admin'),
        ],
        [
          'name' => 'Popescu Ion',
          'email' => 'popescuIon@yahoo.com',
          'password' => bcrypt('123456'),
        ],
        [
          'name' => 'George Ion',
          'email' => 'gerogeIon@yahoo.com',
          'password' => bcrypt('123456'),
        ],
        [
          'name' => 'Sorin Ion',
          'email' => 'sorinIon@yahoo.com',
          'password' => bcrypt('123456'),
        ],
        [
          'name' => 'Ovidiu Ion',
          'email' => 'ovidiuIon@admin.com',
          'password' => bcrypt('123456'),
        ],
        [
          'name' => 'Vasile Ion',
          'email' => 'vasileIon@admin.com',
          'password' => bcrypt('123456'),
        ]
      ]
    );
    }
}
