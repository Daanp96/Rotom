<?php

use Illuminate\Database\Seeder;

class ButtonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("buttons")->insert([
          "button" => "Deurbel",
          "is_pressed" => 0
        ]);

        DB::table("buttons")->insert([
          "button" => "Deurslot",
          "is_pressed" => 0
        ]);
    }
}
