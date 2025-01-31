<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::create([
            'name' => 'Mayerlin Bastidas', 
            'email' => 'mayerlinbastidas@gmail.com',
            'password' => Hash::make('12345678'),
            'api_token' => Str::random(50),
        ]);
    }
}
