<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::setDefaultConnection('mysql');
        // $this->call(UsersTableSeeder::class);
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'site@lourencofilho.com.br',
            'password' => Hash::make('123456'),
            'isAdmin' => 1,
        ]);
    }
}
