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
            'title' => 'Delta Ringtone',
            'ringtone' => 'ringtones/phpa6CkDW'
        ]);
    }
}
