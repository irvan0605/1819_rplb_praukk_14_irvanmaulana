<?php

/** 
 * Model Tagihan untuk menghubungkan kedalam database berkaitan dengan data tagihan.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    /**
     * Tabel Tagihan dari database.
     * 
     * @var string
     */
    protected $table = 'tagihan';

    /**
     * Mendaftarkan atribut yang bisa diisi ketika insert atau update ke database.
     *
     * @var array
     */
    protected $fillable = [
        'penggunaan_id',
        'pelanggan_id',
        'bulan',
        'tahun',
        'jumlah_meter',
        'jumlah_bayar',
        'status',
    ];

    /**
     * Fungsi untuk merelasikan ke model pelanggan.
     */
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    /**
     * Fungsi untuk merelasikan ke model penggunaan.
     */
    public function penggunaan()
    {
        return $this->belongsTo(Penggunaan::class);
    }

    /**
     * Fungsi untuk merelasikan ke model pembayaran.
     */
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
