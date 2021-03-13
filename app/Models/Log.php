<?php

/** 
 * Model Log untuk menghubungkan kedalam database berkaitan dengan data log.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    /**
     * Tabel Log dari database.
     * 
     * @var string
     */
    protected $table = 'log';

    /**
     * Mendaftarkan atribut yang bisa diisi ketika insert atau update ke database.
     *
     * @var array
     */
    protected $fillable = [
        'nama_log',
        'tabel',
        'id_referensi',
        'user_id',
        'deskripsi',
    ];
}
