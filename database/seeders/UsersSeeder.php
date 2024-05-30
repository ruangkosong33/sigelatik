<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'admin',
               'email'=>'admin@mail.com',
               'role'=>'admin',
               'password'=> Hash::make('P4ssw0rd,.?'),
               'verified'=>1,
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
