<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin

            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'admin',

            ],
            // // technician,,user
            // [
            //     'name' => 'Technician',
            //     'email' => 'technician@gmail.com',
            //     'password' => Hash::make('111'),
            //     'role' => 'technician',
            //     'status' => '1',
            //     'job_id' => '1',

            // ],
            // // farmer,

            // [
            //     'name' => 'Farmer',
            //     'email' => 'farmer@gmail.com',
            //     'password' => Hash::make('111'),
            //     'role' => 'farmer',
            //     'status' => '1',
            //     'job_id' => '1',

            // ],
            // // User Data
            // [
            //     'name' => 'User',
            //     'email' => 'user@gmail.com',
            //     'password' => Hash::make('111'),
            //     'role' => 'user',
            //     'status' => '1',
            //     'job_id' => '1',

            // ],

        ]);
    }
}
