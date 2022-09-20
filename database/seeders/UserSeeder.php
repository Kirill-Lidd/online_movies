<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        	'name' => 'admin',
        	'email' => 'admin@ad.min',
        	'password' => Hash::make('123'),
        	'role' => '1',
        ]);

    }
}
