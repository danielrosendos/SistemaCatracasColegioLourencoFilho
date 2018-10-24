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
        DB::table('users')->insert([
            'name' => 'bruno.nunes',
            'email' => 'bruno.nunes@lourencofilho.com.br',
            'password' => Hash::make('brunonunes123'),
            'isAdmin' => 1,
        ]);
    }
}
