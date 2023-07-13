<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
  /**
  * Run the database seeders.
  */
  public function run(): void
  {
    DB::table('users')->insert([
      [
        'name' => 'Admin',
        'email' => 'admin@email.com',
        'password' => Hash::make(12345),
        'user_type' => 1,
      ],
      [
        'name' => 'Student',
        'email' => 'student@email.com',
        'password' => Hash::make(12345),
        'user_type' => 2,
      ],

    ]);
  }
}