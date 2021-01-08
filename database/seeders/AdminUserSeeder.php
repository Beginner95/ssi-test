<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('admin'),
        ]);
    }
}
