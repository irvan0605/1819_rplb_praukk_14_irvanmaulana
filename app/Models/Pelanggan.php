<?php

/** 
 * Model Pelanggan untuk menghubungkan ke dalam database berkaitan dengan data pelanggan.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    /**
     * Tabel Pelanggan dari database.
     * 
     * @var string
     */
    protected $table = 'pelanggan';

    /**
     * Mendaftarkan atribut yang bisa diisi ketika insert atau update ke database.
     *
     * @var array
     */
    protected $fillable = [
        'nomor_meter',
        'nama_pelanggan',
        'alamat',
        'tarif_id',
    ];

    /**
     * Fungsi untuk merelasikan ke model tarif.
     */
    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }

    /**
     * Fungsi untuk merelasikan ke model penggunaan.
     */
    public function penggunaan()
    {
        return $this->hasMany(Penggunaan::class);
    }

    /**
     * Fungsi untuk merelasikan ke model tagihan.
     */
    public function tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }

    /**
     * Fungsi untuk merelasikan ke model pembayaran.
     */
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    /**
     * Fungsi untuk membuat huruf pertama kapital.
     */
    public function getNamapelangganAttribute($value)
    {
        return ucfirst($value);
    }
}
