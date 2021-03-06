<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
         'name' => 'Rotom',
         'email' => 'rotominc@gmail.com',
         'password' => Hash::make('keludamiki'),
         'role' => 'admin',
     ]);
    }
}
