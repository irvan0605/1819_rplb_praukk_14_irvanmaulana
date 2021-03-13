<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pelanggan')->insert([
            [
                'nomor_meter'       => '32153211001',
                'nama_pelanggan'    => 'gunawan',
                'alamat'            => 'Jl. Bungur Raya No.28, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat',
                'tarif_id'          => 1,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'nomor_meter'       => '32153211002',
                'nama_pelanggan'    => 'cahyadi',
                'alamat'            => 'Jl. Fajar Baru No.8, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat',
                'tarif_id'          => 2,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'nomor_meter'       => '32153211003',
                'nama_pelanggan'    => 'lilis heryati',
                'alamat'            => 'Jl. Fajar Asri No.18, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat',
                'tarif_id'          => 2,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'nomor_meter'       => '32153211004',
                'nama_pelanggan'    => 'lia panjaitan',
                'alamat'            => 'Jl. Kenangan No.52, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat',
                'tarif_id'          => 3,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'nomor_meter'       => '32153211005',
                'nama_pelanggan'    => 'ahmad kurniawan',
                'alamat'            => 'Jl. Imam Bonjol No.22, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat',
                'tarif_id'          => 4,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'nomor_meter'       => '32153211006',
                'nama_pelanggan'    => 'supardi',
                'alamat'            => 'Jl. Dahlia Raya No.102, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat',
                'tarif_id'          => 1,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'nomor_meter'       => '32153211007',
                'nama_pelanggan'    => 'iksan fikryanto',
                'alamat'            => 'Jl. Puri I No.35, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat',
                'tarif_id'          => 5,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'nomor_meter'       => '32153211008',
                'nama_pelanggan'    => 'reja setiawan',
                'alamat'            => 'Jl. Cempaka No.99, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat',
                'tarif_id'          => 4,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'nomor_meter'       => '32153211009',
                'nama_pelanggan'    => 'nashwa ramadan',
                'alamat'            => 'Jl. Mawar No.12, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat',
                'tarif_id'          => 3,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],
            [
                'nomor_meter'       => '32153211010',
                'nama_pelanggan'    => 'yudhistira',
                'alamat'            => 'Jl. Nangka No.25, Kel.Jakasampurna, Kec.Bekasi Barat, Kota Bekasi, Jawa Barat',
                'tarif_id'          => 5,
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ],

        ]);
    }
}
