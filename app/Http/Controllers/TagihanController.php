<?php

/**
 * Controller Untuk Menghubungkan Model dengan View Halaman yang Berkaitan dengan Tagihan.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Http\Controllers;

/**
 * Menggunakan Model Pelanggan.
 * Menggunakan Model Tagihan.
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pelanggan;
use App\Models\Tagihan;

class TagihanController extends Controller
{

    /**
     * Menyaring HTTP Request yang masuk Pada saat User berhasil melakukan otentikasi.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan data tagihan dari database.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Gate::allows('admin')) {

            $tagihan = Tagihan::orderBy('id', 'DESC')->get();

            return view('admin.tagihan', compact('tagihan'));
        } elseif (Gate::allows('pelanggan')) {

            return view('pelanggan.tagihan');
        } else {

            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Memeriksa data pelanggan yang diinput.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cek_pelanggan(Request $request)
    {
        //
        if (Gate::allows('pelanggan')) {

            $pelanggan = Pelanggan::where('nomor_meter', $request->pelanggan)->get()->first();

            if ($pelanggan == false) {

                Alert::warning('Perhatian', 'ID Pelanggan Tidak Ditemukan');

                return back();
            } else {

                $id_pelanggan = $pelanggan['id'];
                $detail_pelanggan = Tagihan::where('pelanggan_id', $id_pelanggan)->get()->first();
                $detail_tagihan = Tagihan::where('pelanggan_id', $id_pelanggan)->get();

                if ($detail_pelanggan->status == "dibayar" || $detail_pelanggan->status == "diproses") {

                    Alert::warning('Perhatian', 'ID Pelanggan Tidak Memiliki Tagihan');

                    return back();
                } else {

                    return view('pelanggan.tagihan', compact('detail_pelanggan', 'detail_tagihan'));
                }
            }
        } else {

            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Menampilkan halaman data laporan tagihan.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporan()
    {
        //
        if (Gate::allows('admin')) {

            return view('admin.laporan_tagihan');
        } else {

            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Memeriksa data laporan tagihan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cek_laporan(Request $request)
    {
        //
        if (Gate::allows('admin')) {

            if (!$request->bulan && !$request->tahun) {

                return back()->with('status', 'Bulan dan Tahun Wajib Diisi');
            } elseif (!$request->tahun) {

                return back()->with('status', 'Tahun Wajib Diisi');
            } elseif (!$request->bulan) {

                return back()->with('status', 'Bulan Wajib Diisi');
            } else {

                $tagihan = Tagihan::where('bulan', $request->bulan)->where('tahun', $request->tahun)->orderBy('id', 'DESC')->get();
                $bulan = $request->bulan;
                $tahun = $request->tahun;

                return view('admin.laporan_tagihan', compact('tagihan', 'bulan', 'tahun'));
            }
        } else {

            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Mencetak data laporan tagihan menjadi pdf.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cetak_laporan(Request $request)
    {
        if (Gate::allows('admin')) {

            $bulan = $request->bulan;
            $tahun = $request->tahun;
            $tagihan = Tagihan::where('bulan', $bulan)->where('tahun', $tahun)->orderBy('id', 'DESC')->get();

            $pdf = PDF::loadView('admin.laporan_tagihan_pdf', compact('tagihan', 'bulan', 'tahun'))->setPaper('a4', 'landscape');

            return $pdf->stream();
        } else {

            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }
}
