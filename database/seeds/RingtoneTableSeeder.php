<?php

use Illuminate\Database\Seeder;

class RingtoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   DB::table('ringtone')->insert([
            'title' => 'Default Beltoon',
            'ringtone' => 'ringtones/Default_Bell.mp3'  
        ]);
DB::table('ringtone')->insert([
            'title' => 'Delta Ringtone',
            'ringtone' => 'ringtones/phpa6CkDW'
        ]);
    }
}
