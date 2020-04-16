<?php

use Illuminate\Database\Seeder;

class FingerprintTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fingerprint')->insert([
          'contact_name' => "Kevin",
          'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
