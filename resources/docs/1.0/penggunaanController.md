# PenggunaanController

---

-   [Code](#section-1)
-   [Index](#section-2)
-   [Create](#section-3)
-   [FindMeter](#section-4)
-   [Store](#section-5)
-   [Edit](#section-6)
-   [Update](#section-7)
-   [Destroy](#section-8)

<larecipe-card type="primary" rounded>
Controller Ini Untuk Menghubungkan Model dengan View Halaman Kelola Penggunaan.
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
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Models\Tarif;
use App\Models\Pelanggan;
use App\Models\Penggunaan;
use App\Models\Tagihan;

```

---

<a name="section-2"></a>

### Index

---

<larecipe-card type="info" rounded>
Code ini untuk menampilkan data penggunaan dari database.
</larecipe-card>
---

```php
public function index()
{
    if (Gate::allows('admin')) {

        $penggunaan = Tagihan::orderBy('id', 'DESC')->get();

        return view('admin.penggunaan', compact('penggunaan'));
    } else {
        return abort(403, 'Anda Tidak Memiliki Hak Akses!');
    }
}
```

---

<a name="section-3"></a>

### Create

---

<larecipe-card type="primary" rounded>
Code ini untuk menampilkan form untuk membuat data penggunaan baru.
</larecipe-card>
---

```php
public function create()
{
    if (Gate::allows('admin')) {

        $penggunaan = Penggunaan::max('id') + 1;
        $pelanggan = Pelanggan::get();

        return view('admin.penggunaan_add', compact('pelanggan', 'penggunaan'));
    } else {
        return abort(403, 'Anda Tidak Memiliki Hak Akses!');
    }
}
```

---

<a name="section-4"></a>

### Index

---

<larecipe-card type="info" rounded>
Code ini untuk mengambil nilai meter awal dari pelanggan yang ditentukan di form untuk membuat data penggunaan baru.
</larecipe-card>
---

```php
public function findMeter(Request $request)
{
    $meter = Penggunaan::where('pelanggan_id', $request->id)->max('meter_akhir');

    if (!$meter) {
        $meter_awal = 0;
    } else {
        $meter_awal = $meter;
    }

    return response()->json($meter_awal);
}
```

---

<a name="section-5"></a>

### Store

---

<larecipe-card type="success" rounded>
Code ini untuk menyimpan menyimpan data penggunaan yang baru dibuat di database dan menyimpan data tagihan berdasarkan data penggunaan di database.
</larecipe-card>
---

```php
public function store(Request $request)
{
    $dataPenggunaan = [
        'id'                    => $request->id,
        'pelanggan_id'          => $request->pelanggan_id,
        'bulan'                 => $request->bulan,
        'tahun'                 => $request->tahun,
        'meter_awal'            => $request->meter_awal,
        'meter_akhir'           => $request->meter_akhir,
    ];

    $rules = [
        'pelanggan_id'          => ['required'],
        'bulan'                 => ['required'],
        'tahun'                 => ['required'],
        'meter_awal'            => ['required'],
        'meter_akhir'           => ['required'],
    ];
    $messages = [
        'pelanggan_id.required'     => 'ID Pelanggan wajib diisi.',
        'bulan.required'            => 'Bulan wajib diisi.',
        'tahun.required'            => 'Tahun wajib diisi.',
        'meter_awal.required'       => 'Meter Awal wajib diisi.',
        'meter_akhir.required'      => 'Meter Akhir wajib diisi.',
    ];

    $validator =  Validator::make($dataPenggunaan, $rules, $messages);
    $validator->validate();

    // Ambil data penggunaaan berdasarkan pelanggan_id, bulan, dan tahun yang diinput
    $data = Penggunaan::where('pelanggan_id', $request->pelanggan_id)->where('bulan', $request->bulan)->where('tahun', $request->tahun)->get()->first();


    // Jika pelanggan_id, bulan dan tahun yang diinput sudah tersedia di database
    if ($data) {
        // Kembali ke halaman dengan status
        return back()->with('status', 'Data Penggunaan yang Diinput sudah tersedia!');
    }

    // Kurangi meter akhir dengan meter awal untuk mendapatkan jumlah meter
    $jumlah_meter = $request->meter_akhir - $request->meter_awal;

    // Ambil data tarif_id berdasarkan id pelanggan yang diinput
    $getTarifPelanggan = Pelanggan::find($request->pelanggan_id)->tarif_id;

    // Ambil harga tarif perkwh dari berdasarkan tarif_id tiap pelanggan
    $getTarif = Tarif::find($getTarifPelanggan)->tarif_perkwh;

    // Hitung jumlah bayar dengan mengkalikan jumlah_meter dan harga tarif_perkwh menggunakan function
    $bayar = DB::select('SELECT jumlah_bayar(' . $jumlah_meter . ',' . $getTarif . ') AS jumlah_bayar')[0]->jumlah_bayar;

    $dataTagihan = [
        'penggunaan_id'         => $request->id,
        'pelanggan_id'          => $request->pelanggan_id,
        'bulan'                 => $request->bulan,
        'tahun'                 => $request->tahun,
        'jumlah_meter'          => $jumlah_meter,
        'jumlah_bayar'          => $bayar,
        'status'                => 'belum bayar',
    ];

    $penggunaan =  Penggunaan::create($dataPenggunaan);
    $tagihan =  Tagihan::create($dataTagihan);
    Alert::success('Sukses', 'Tambah Data Penggunaan Berhasil !');

    return redirect('penggunaan');
}
```

---

<a name="section-6"></a>

### Edit

---

<larecipe-card type="primary" rounded>
Code ini untuk menampilkan form untuk mengedit data penggunaan yang telah ditentukan.
</larecipe-card>
---

```php
public function edit($id)
{
    //
    if (Gate::allows('admin')) {

        $data = Tagihan::find($id);
        $penggunaan = $data->penggunaan_id;

        if ($data->status == 'diproses' || $data->status == 'dibayar') {

            Alert::warning('Perhatian', 'Data Yang Sedang Diproses / Sudah Dibayar Tidak dapat Diedit !');

            return back();
        }

        return view('admin.penggunaan_edit', compact('data'));
    } else {
        return abort(403, 'Anda Tidak Memiliki Hak Akses!');
    }
}
```

---

<a name="section-7"></a>

### Update

---

<larecipe-card type="success" rounded>
Code ini untuk memperbarui data penggunaan yang telah ditentukan di database dan memperbarui data tagihan sesuai dengan data penggunaan yang telah ditentukan di database.
</larecipe-card>
---

```php
public function update(Request $request, $id)
{
    //
    $dataPenggunaan = [
        'pelanggan_id'          => $request->pelanggan_id,
        'bulan'                 => $request->bulan,
        'tahun'                 => $request->tahun,
        'meter_awal'            => $request->meter_awal,
        'meter_akhir'           => $request->meter_akhir,
    ];

    $rules = [
        'meter_akhir'           => ['required'],
    ];
    $messages = [
        'meter_akhir.required'      => 'Meter Akhir wajib diisi.',
    ];

    $validator =  Validator::make($dataPenggunaan, $rules, $messages);
    $validator->validate();

    // Kurangi meter akhir dengan meter awal untuk mendapatkan jumlah meter
    $jumlah_meter = $request->meter_akhir - $request->meter_awal;

    // Ambil data tarif_id berdasarkan id pelanggan yang diinput
    $getTarifPelanggan = Pelanggan::find($request->pelanggan_id)->tarif_id;

    // Ambil harga tarif perkwh dari berdasarkan tarif_id tiap pelanggan
    $getTarif = Tarif::find($getTarifPelanggan)->tarif_perkwh;

    // Hitung jumlah bayar dengan mengkalikan jumlah_meter dan harga tarif_perkwh menggunakan function
    $bayar = DB::select('SELECT jumlah_bayar(' . $jumlah_meter . ',' . $getTarif . ') AS jumlah_bayar')[0]->jumlah_bayar;

    $dataTagihan = [
        'penggunaan_id'         => $id,
        'pelanggan_id'          => $request->pelanggan_id,
        'bulan'                 => $request->bulan,
        'tahun'                 => $request->tahun,
        'jumlah_meter'          => $jumlah_meter,
        'jumlah_bayar'          => $bayar,
        'status'                => 'belum bayar',
    ];

    $penggunaan = Penggunaan::whereId($id)->first();
    $penggunaan->update($dataPenggunaan);

    $tagihan = Tagihan::whereId($request->id)->first();
    $tagihan->update($dataTagihan);
    Alert::success('Sukses', 'Edit Data Penggunaan Berhasil !');

    return redirect('penggunaan');
}
```

---

<a name="section-8"></a>

### Destroy

---

<larecipe-card type="danger" rounded>
Code ini untuk menghapus data penggunaan yang telah ditentukan dari database.
</larecipe-card>
---

```php
public function destroy($id)
{
    //
    if (Gate::allows('admin')) {
        $data = Tagihan::find($id);

        if ($data->status == 'diproses' || $data->status == 'dibayar') {

            Alert::warning('Perhatian', 'Data Yang Sedang Diproses / Sudah Dibayar Tidak dapat Dihapus !');

            return back();
        }

        Tagihan::whereId($id)->delete();
        Penggunaan::whereId($data->penggunaan_id)->delete();
        Alert::success('Sukses', 'Hapus Data Penggunaan Berhasil !');

        return redirect('penggunaan');
    } else {
        return abort(403, 'Anda Tidak Memiliki Hak Akses!');
    }
}
```

---
