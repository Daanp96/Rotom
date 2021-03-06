<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(RingtoneTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(FingerprintTableSeeder::class);
        $this->call(HistoryTableSeeder::class);
        $this->call(ButtonsTableSeeder::class);
    }
}
