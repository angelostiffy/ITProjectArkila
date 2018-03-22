<?php

use Illuminate\Database\Seeder;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => '$2y$10$9cyV8.dgRdGfOwVSpnUtb.ft4QdFUm5w5dyaMeSzv3i6v799W4W3m',
            'user_type' => 'Super-Admin',
            'status' => 'enable',
            'terminal_id' => 1
        ]);
    }
}
