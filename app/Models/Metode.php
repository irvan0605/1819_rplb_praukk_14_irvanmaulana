<?php

/** 
 * Model Metode untuk menghubungkan kedalam database berkaitan dengan data metode.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metode extends Model
{
    use HasFactory;

    /**
     * Tabel Metode dari database.
     * 
     * @var string
     */
    protected $table = 'metode';

    /**
     * Fungsi untuk merelasikan ke model pembayaran.
     */
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }

    /**
     * Fungsi untuk membuat huruf pertama kapital.
     */
    public function getNamametodeAttribute($value)
    {
        return ucfirst($value);
    }
}
