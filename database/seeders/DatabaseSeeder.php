<?php
// babi halal
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori_barang;
use App\Models\Katgeori_barang;
use App\Models\Role;
use App\Models\Status_barang;
use App\Models\Status_jual;
use App\Models\Status_pengerjaan;
use App\Models\Status_user;
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
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role_id' => 1,
            'nomor' => '087777666555',
            'kecamatan' => 'kudus',
            'kota' => 'kudus',
            'provinsi' => 'kudus',
            'alamat' => 'kudus, rt00',
            'status_user_id' => 1
        ]);

        User::create([
            'nama' => 'marketing',
            'username' => 'marketing',
            'email' => 'marketing@gmail.com',
            'password' => bcrypt('marketing'),
            'role_id' => 2,
            'nomor' => '087777666555',
            'kecamatan' => 'kudus',
            'kota' => 'kudus',
            'provinsi' => 'kudus',
            'alamat' => 'kudus, rt00',
            'status_user_id' => 1
        ]);

        Role::create([
            'nama' => 'Admin'
        ]);
        Role::create([
            'nama' => 'Sales'
        ]);

        Status_barang::create([
            'nama'  =>  'Aktif'
        ]);

        Status_barang::create([
            'nama'  =>  'Tidak Aktif'
        ]);

        Status_jual::create([
            'nama'  =>  'Jual'
        ]);

        Status_jual::create([
            'nama'  =>  'Tidak di Jual'
        ]);

        Kategori_barang::create([
            'nama'  =>  'Mentahan'
        ]);

        Kategori_barang::create([
            'nama'  =>  'Aksesoris'
        ]);

        Kategori_barang::create([
            'nama'  =>  'Barang Jadi'
        ]);

        Kategori_barang::create([
            'nama'  =>  'Packing'
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
        Status_pengerjaan::create([
            'id' => 9,
            'nama' => 'Tolak',
            'warna' => 'success'
        ]);

        Status_user::create([
            'nama' => 'ACTIVE'
        ]);

        Status_user::create([
            'nama' => 'NONACTIVE'
        ]);
    }
}
