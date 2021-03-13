# TagihanController

---

-   [Code](#section-1)
-   [Index](#section-2)
-   [Cek Pelanggan](#section-3)
-   [Laporan](#section-4)
-   [Cek Laporan](#section-5)
-   [Cetak Laporan](#section-6)

<larecipe-card type="primary" rounded>
Controller Ini Untuk Menghubungkan Model dengan View Halaman yang Berkaitan dengan Tagihan.
</larecipe-card>

---

<a name="section-1"></a>

## Code

---

<larecipe-card type="warning" rounded>
Code berikut ini digunakan untuk memanggil model dan file yang memiliki model dan class terkait.
</larecipe-card>

---

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;
use Alert;
use App\Models\Pelanggan;
use App\Models\Tagihan;

```

---

<a name="section-2"></a>

### Index

---

<larecipe-card type="info" rounded>
Code ini untuk menampilkan data tagihan dari database.
</larecipe-card>
---

```php
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
```

---

<a name="section-3"></a>

### Cek Pelanggan

---

<larecipe-card type="primary" rounded>
Code ini untuk memeriksa data pelanggan yang diinput.
</larecipe-card>
---

```php
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
```

---

<a name="section-4"></a>

### Laporan

---

<larecipe-card type="success" rounded>
Code ini untuk menampilkan halaman data laporan tagihan.
</larecipe-card>
---

```php
public function laporan()
{
    //
    if (Gate::allows('admin')) {

        return view('admin.laporan_tagihan');
    } else {

        return abort(403, 'Anda Tidak Memiliki Hak Akses!');
    }
}
```

---

<a name="section-5"></a>

### Cek Laporan

---

<larecipe-card type="primary" rounded>
Code ini untuk memeriksa data laporan tagihan.
</larecipe-card>
---

```php
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
```

---

<a name="section-6"></a>

### Cetak Laporan

---

<larecipe-card type="success" rounded>
Code ini untuk mencetak data laporan tagihan menjadi pdf.
</larecipe-card>
---

```php
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
```

---
