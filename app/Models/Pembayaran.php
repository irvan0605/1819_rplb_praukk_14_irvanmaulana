<?php

/** 
 * Model Pembayaran untuk menghubungkan kedalam database berkaitan dengan data pembayaran.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    /**
     * Tabel Pembayaran dari database.
     * 
     * @var string
     */
    protected $table = 'pembayaran';

    /**
     * Mendaftarkan atribut yang bisa diisi ketika insert atau update ke database.
     *
     * @var array
     */
    protected $fillable = [
        'tagihan_id',
        'pelanggan_id',
        'tanggal_pembayaran',
        'bulan_bayar',
        'tahun_bayar',
        'biaya_admin',
        'total_bayar',
        'metode_id',
        'status',
        'bukti_bayar',
        'user_id',
    ];

    /**
     * Fungsi untuk merelasikan ke model tagihan.
     */
    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class);
    }

    /**
     * Fungsi untuk merelasikan ke model metode.
     */
    public function metode()
    {
        return $this->belongsTo(Metode::class);
    }

    /**
     * Fungsi untuk merelasikan ke model pelanggan.
     */
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
