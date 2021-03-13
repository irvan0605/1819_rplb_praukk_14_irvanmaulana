<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggunaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('penggunaan')->insert([
            [
                'pelanggan_id'  => 1,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'meter_awal'    => 0,
                'meter_akhir'   => 150,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'pelanggan_id'  => 2,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'meter_awal'    => 50,
                'meter_akhir'   => 250,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'pelanggan_id'  => 3,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'meter_awal'    => 0,
                'meter_akhir'   => 200,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'pelanggan_id'  => 4,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'meter_awal'    => 50,
                'meter_akhir'   => 150,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'pelanggan_id'  => 5,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'meter_awal'    => 0,
                'meter_akhir'   => 100,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'pelanggan_id'  => 6,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'meter_awal'    => 0,
                'meter_akhir'   => 150,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'pelanggan_id'  => 7,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'meter_awal'    => 30,
                'meter_akhir'   => 100,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'pelanggan_id'  => 8,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'meter_awal'    => 100,
                'meter_akhir'   => 300,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'pelanggan_id'  => 9,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'meter_awal'    => 50,
                'meter_akhir'   => 100,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'pelanggan_id'  => 10,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'meter_awal'    => 100,
                'meter_akhir'   => 250,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
