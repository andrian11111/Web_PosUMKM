<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Umkm;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed data for User
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed data for Umkm and link to user
        Umkm::create([
            'nama_umkm' => 'Andrian Bakso',
            'alamat' => 'Jl. Mawar No. 123',
            'nomor_telepon' => '12819831',
            'kategori' => 'kuliner',
            'gambar' => '1731383514.png',
            'deskripsi' => 'Bakso enak dan lezat',
            'user_id' => $user->id, // Assign the created user's ID
        ]);
    }
}