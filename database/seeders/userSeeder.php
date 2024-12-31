<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::create([
           'nama' => 'admin',
           'alamat' => 'Jl. Admin',
           'telepon' => '08123456789',
           'email' => 'admin@gmail.com',
              'password' => bcrypt('admin'),
              'role' => 'admin'
         ]);
    }
}
