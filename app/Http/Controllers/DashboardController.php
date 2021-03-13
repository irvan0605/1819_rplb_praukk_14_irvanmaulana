<?php

/**
 * Controller Untuk Menampilkan view Dashboard Untuk User Admin, Bank, dan Pelanggan.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{

    /**
     * Menyaring HTTP Request yang masuk Pada saat User berhasil melakukan otentikasi.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan Dashboard Untuk User Admin, Bank, dan Pelanggan.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('admin')) {
            return view('admin.index');
        } elseif (Gate::allows('bank')) {
            return view('bank.index');
        } elseif (Gate::allows('pelanggan')) {
            return view('pelanggan.index');
        } else {
            return abort(404);
        }
    }
}
