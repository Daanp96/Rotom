<?php

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact')->insert([
            'name' => 'Daan',
//            'banner' => 'img/banner.jpg',
//            'profile' => 'img/avatar.jpg',
            'door_access' => 'custom',
            'ringtone' => 'music/megalovania.mp3',
            'priority' => true
        ]);
    }
}
