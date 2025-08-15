<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin SiDesa',
            'email' => 'admint@gmail.com',
            'password' => bcrypt('12345678'),
            'status' => 'approved',
            'role_id' => 1
        ]);
    }
}
