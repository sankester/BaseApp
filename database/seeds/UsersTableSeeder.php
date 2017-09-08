<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Ach. Vani Ardiansyah',
            'username' => 'sankester',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'lock_st' => 0,
            'activation' => str_random(50),
            'registerDate' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'role_id' => 1
        ]);
    }
}
