<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\Status_pengerjaan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'nama' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role_id' => 1
        ]);

        User::create([
            'nama' => 'marketing',
            'username' => 'marketing',
            'password' => bcrypt('123456'),
            'role_id' => 2
        ]);

        Role::create([
            'nama' => 'Admin'
        ]);
        Role::create([
            'nama' => 'Sales'
        ]);

        Status_pengerjaan::create([
            'nama' => 'Pending',
            'warna' => 'danger'
        ]);
        Status_pengerjaan::create([
            'nama' => 'List order',
            'warna' => 'secondary'
        ]);
        Status_pengerjaan::create([
            'nama' => 'Mentahan',
            'warna' => 'warning'
        ]);
        Status_pengerjaan::create([
            'nama' => 'Finishing',
            'warna' => 'info'
        ]);
        Status_pengerjaan::create([
            'nama' => 'Jok',
            'warna' => 'primary'
        ]);
        Status_pengerjaan::create([
            'nama' => 'Gudang bungkus',
            'warna' => 'success'
        ]);
    }
}
