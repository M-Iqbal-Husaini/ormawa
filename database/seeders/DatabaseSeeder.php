<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Ormawa;
use App\Models\Organisasi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        Admin::create([
            'name' => 'admin',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        Organisasi::create([
            'logo' => 'abc',
            'nama' => 'HMTI',
            'deskripsi' => 'HMTI adalah himpunan mahasiswa teknik informatika yang ditujukan hanya untuk mahassiswa Teknik Informatika',
        ]);
    }
}
