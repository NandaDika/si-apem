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
            'id' => 'UUID13', // Example user ID
            'nama' => 'John Doe',
            'role' => 'user',
            'poin' => 14,
            'kode_guru' => '1109',
            'password' => Hash::make('nanda'), // Hashing the password
        ]);
    }
}
