<?php

/** 
 * Model Tarif untuk menghubungkan kedalam database berkaitan dengan data tarif.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    /**
     * Tabel Tarif dari database.
     * 
     * @var string
     */
    protected $table = 'tarif';

    /**
     * Mendaftarkan atribut yang bisa diisi ketika insert atau update ke database.
     *
     * @var array
     */
    protected $fillable = [
        'kode_tarif',
        'golongan',
        'daya',
        'tarif_perkwh',
    ];

    /**
     * Fungsi untuk merelasikan ke model pelanggan.
     */
    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class);
    }
}
