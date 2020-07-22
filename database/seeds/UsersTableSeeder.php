<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table users is empty
        if(DB::table('users')->get()->count() == 0){

            DB::table('users')->insert([

                [
                    'name' => 'SuperAdmin',
                    'email' => 'superadmin@gmail.com',
                    'password' => bcrypt('superadmin'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('admin'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'users',
                    'email' => 'users@gmail.com',
                    'password' => bcrypt('password'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
