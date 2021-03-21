<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'nama_user'         => 'irwansyah',
                'username'          => 'admin',
                'password'          => Hash::make('admin'),
                'nomor_telepon'     => '081221212121',
                'foto'              => 'img/profile.jpg',
                'level_id'          => 1,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'nama_user'         => 'darman',
                'username'          => 'bankbca',
                'password'          => Hash::make('bankbca'),
                'nomor_telepon'     => '081599988822',
                'foto'              => 'img/profile.jpg',
                'level_id'          => 2,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'nama_user'         => 'susanto',
                'username'          => 'bankbri',
                'password'          => Hash::make('bankbri'),
                'nomor_telepon'     => '081588880000',
                'foto'              => 'img/profile.jpg',
                'level_id'          => 2,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'nama_user'         => 'ferdiansyah',
                'username'          => 'bankmandiri',
                'password'          => Hash::make('bankmandiri'),
                'nomor_telepon'     => '081890299999',
                'foto'              => 'img/profile.jpg',
                'level_id'          => 2,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'nama_user'         => 'hasan',
                'username'          => 'hasan123',
                'password'          => Hash::make('hasan123'),
                'nomor_telepon'     => '083811002288',
                'foto'              => 'img/profile.jpg',
                'level_id'          => 3,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
