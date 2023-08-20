<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make(123), 
            'user_type' => 1, 
        ]);

        User::create([
            'name' => 'Student',
            'email' => 'student@email.com',
            'password' => Hash::make(123), 
            'user_type' => 
            2, 
        ]);
    
    }
}
