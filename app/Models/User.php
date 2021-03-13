<?php

/** 
 * Model User untuk menghubungkan kedalam database berkaitan dengan data user.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Mendaftarkan atribut yang bisa diisi ketika insert atau update ke database.
     *
     * @var array
     */
    protected $fillable = [
        'nama_user',
        'username',
        'password',
        'nomor_telepon',
        'foto',
        'level_id',
    ];

    /**
     * Menyembunyikan atribut untuk array.
     * 
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
