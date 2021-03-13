<?php

/** 
 * Model Penggunaan untuk menghubungkan kedalam database berkaitan dengan data penggunaan.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunaan extends Model
{
    use HasFactory;

    /**
     * Tabel Penggunaan dari database.
     * 
     * @var string
     */
    protected $table = 'penggunaan';

    /**
     * Mendaftarkan atribut yang bisa diisi ketika insert atau update ke database.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'pelanggan_id',
        'bulan',
        'tahun',
        'meter_awal',
        'meter_akhir',
    ];

    /**
     * Fungsi untuk merelasikan ke model pelanggan.
     */
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    /**
     * Fungsi untuk merelasikan ke model tagihan.
     */
    public function tagihan()
    {
        return $this->hasOne(Tagihan::class);
    }

    /**
     * Fungsi untuk membuat format nomor meter.
     */
    public function formatMeter($value)
    {
        return sprintf("%08d", $value);
    }
}
