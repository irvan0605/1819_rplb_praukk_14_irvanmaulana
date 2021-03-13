<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tarif')->insert([
            [
                'kode_tarif'    => 'R1/450VA',
                'golongan'      => 'R1',
                'daya'          => '450VA',
                'tarif_perkwh'  => 169,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'kode_tarif'    => 'R1/900VA',
                'golongan'      => 'R1',
                'daya'          => '900VA',
                'tarif_perkwh'  => 274,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'kode_tarif'    => 'R1M/900VA',
                'golongan'      => 'R1M',
                'daya'          => '900VA',
                'tarif_perkwh'  => 1352,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'kode_tarif'    => 'R1/1300VA',
                'golongan'      => 'R1',
                'daya'          => '1300VA',
                'tarif_perkwh'  => 1444,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
            [
                'kode_tarif'    => 'R1/2200VA',
                'golongan'      => 'R1',
                'daya'          => '2200VA',
                'tarif_perkwh'  => 1444,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
