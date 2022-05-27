<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'Rudi Hardianto',
            'email'             => 'rud.hardianto@gmail.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
    }
}