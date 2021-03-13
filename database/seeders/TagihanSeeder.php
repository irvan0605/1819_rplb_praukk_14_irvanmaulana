<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;

class TagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tagihan')->insert([
            [
                'penggunaan_id' => 1,
                'pelanggan_id'  => 1,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'jumlah_meter'  => 150,
                'jumlah_bayar'  => 25230,
                'status'       => 'belum bayar',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'penggunaan_id' => 2,
                'pelanggan_id'  => 2,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'jumlah_meter'  => 200,
                'jumlah_bayar'  => 54800,
                'status'       => 'belum bayar',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'penggunaan_id' => 3,
                'pelanggan_id'  => 3,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'jumlah_meter'  => 200,
                'jumlah_bayar'  => 54800,
                'status'       => 'belum bayar',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'penggunaan_id' => 4,
                'pelanggan_id'  => 4,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'jumlah_meter'  => 100,
                'jumlah_bayar'  => 135200,
                'status'       => 'belum bayar',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'penggunaan_id' => 5,
                'pelanggan_id'  => 5,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'jumlah_meter'  => 100,
                'jumlah_bayar'  => 144400,
                'status'       => 'belum bayar',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'penggunaan_id' => 6,
                'pelanggan_id'  => 6,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'jumlah_meter'  => 150,
                'jumlah_bayar'  => 25350,
                'status'       => 'belum bayar',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'penggunaan_id' => 7,
                'pelanggan_id'  => 7,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'jumlah_meter'  => 70,
                'jumlah_bayar'  => 101080,
                'status'       => 'belum bayar',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'penggunaan_id' => 8,
                'pelanggan_id'  => 8,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'jumlah_meter'  => 200,
                'jumlah_bayar'  => 288800,
                'status'       => 'belum bayar',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'penggunaan_id' => 9,
                'pelanggan_id'  => 9,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'jumlah_meter'  => 50,
                'jumlah_bayar'  => 67600,
                'status'       => 'belum bayar',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'penggunaan_id' => 10,
                'pelanggan_id'  => 10,
                'bulan'         => 'januari',
                'tahun'         => '2021',
                'jumlah_meter'  => 150,
                'jumlah_bayar'  => 216600,
                'status'       => 'belum bayar',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
