<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => Str::random(10),
            'surname' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
        ]);

        DB::table('customers')->insert([
            'name' => Str::random(10),
            'surname' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
        ]);

        DB::table('customers')->insert([
            'name' => Str::random(10),
            'surname' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
        ]);
    }
}
