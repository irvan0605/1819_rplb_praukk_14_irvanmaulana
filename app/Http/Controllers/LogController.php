<?php

/**
 * Controller Untuk Menghubungkan Model dengan View Halaman Activity Log.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Http\Controllers;

/**
 * Menggunakan Model Log.
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Alert;
use App\Models\Log;

class LogController extends Controller
{

    /**
     * Menyaring HTTP Request yang masuk Pada saat User berhasil melakukan otentikasi.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan data log dari database.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('admin')) {

            $log = DB::select('SELECT * FROM activity_log ORDER BY id DESC');

            return view('admin.log', compact('log'));
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Menghapus data log yang telah ditentukan dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('admin')) {

            Log::whereId($id)->delete();
            Alert::success('Sukses', 'Data Log Berhasil Dihapus');

            return redirect()->route('activity-log');
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }
}
