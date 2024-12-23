<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'id' => rand(1, 99999999),
            'name' => 'ADMIN',
            'password' => password_hash('digides123', PASSWORD_DEFAULT),
            'username' => 'digides123@gmail.com'
        ]);
    }
}
