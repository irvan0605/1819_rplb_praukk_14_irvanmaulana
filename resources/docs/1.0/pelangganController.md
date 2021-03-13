# PelangganController

---

-   [Code](#section-1)
-   [Index](#section-2)
-   [Create](#section-3)
-   [Store](#section-4)
-   [Edit](#section-5)
-   [Update](#section-6)
-   [Destroy](#section-7)

<larecipe-card type="primary" rounded>
Controller Ini Untuk Menghubungkan Model dengan View Halaman Kelola Pelanggan.
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
use Alert;
use App\Models\Pelanggan;
use App\Models\Penggunaan;
use App\Models\Tarif;

```

---

<a name="section-2"></a>

### Index

---

<larecipe-card type="info" rounded>
Code ini untuk menampilkan data pelanggan dari database.
</larecipe-card>
---

```php
public function index()
{
    if (Gate::allows('admin')) {

        $data = Pelanggan::all();

        return view('admin.pelanggan', compact('data'));
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
Code ini untuk menampilkan form untuk membuat data pelanggan baru.
</larecipe-card>
---

```php
public function create()
{
    if (Gate::allows('admin')) {

        $data = Pelanggan::max('nomor_meter') + 1;
        $tarif = Tarif::get();

        return view('admin.pelanggan_add', compact('data', 'tarif'));
    } else {
        return abort(403, 'Anda Tidak Memiliki Hak Akses!');
    }
}
```

---

<a name="section-4"></a>

### Store

---

<larecipe-card type="success" rounded>
Code ini untuk menyimpan data pelanggan yang baru dibuat di database.
</larecipe-card>
---

```php
public function store(Request $request)
{
    $data = [
        'nomor_meter'       => $request->nomor_meter,
        'nama_pelanggan'    => $request->nama_pelanggan,
        'alamat'            => $request->alamat,
        'tarif_id'          => $request->tarif_id,
    ];

    $rules = [
        'nama_pelanggan'    => ['required'],
        'alamat'            => ['required'],
        'tarif_id'          => ['required'],
    ];

    $messages = [
        'nama_pelanggan.required'     => 'Nama Pelanggan wajib diisi.',
        'alamat.required'             => 'Alamat wajib diisi.',
        'tarif_id.required'           => 'Tarif wajib diisi.',
    ];

    $validator =  Validator::make($data, $rules, $messages);
    $validator->validate();

    Pelanggan::create($data);
    Alert::success('Sukses', 'Tambah Data Pelanggan Berhasil !');

    return redirect('pelanggan');
}
```

---

<a name="section-5"></a>

### Edit

---

<larecipe-card type="primary" rounded>
Code ini untuk menampilkan form untuk mengedit data pelanggan yang telah ditentukan.
</larecipe-card>
---

```php
public function edit($id)
{
    if (Gate::allows('admin')) {

        $tarif = Tarif::get();
        $pelanggan = Pelanggan::find($id);

        return view('admin.pelanggan_edit', compact('tarif', 'pelanggan'));
    } else {
        return abort(403, 'Anda Tidak Memiliki Hak Akses!');
    }
}
```

---

<a name="section-6"></a>

### Update

---

<larecipe-card type="success" rounded>
Code ini untuk memperbarui data pelanggan yang telah ditentukan di database.
</larecipe-card>
---

```php
public function update(Request $request, $id)
{
    $data = [
        'nomor_meter'       => $request->nomor_meter,
        'nama_pelanggan'    => $request->nama_pelanggan,
        'alamat'            => $request->alamat,
        'tarif_id'          => $request->tarif_id,
    ];

    $rules = [
        'nama_pelanggan'    => ['required'],
        'alamat'            => ['required'],
    ];

    $messages = [
        'nama_pelanggan.required'     => 'Nama Pelanggan wajib diisi.',
        'alamat.required'             => 'Alamat wajib diisi.',
    ];

    $validator =  Validator::make($data, $rules, $messages);
    $validator->validate();

    $tarif = Pelanggan::whereId($id)->first();
    $tarif->update($data);
    Alert::success('Sukses', 'Edit Data Pelanggan Berhasil !');

    return redirect('pelanggan');
}
```

---

<a name="section-7"></a>

### Destroy

---

<larecipe-card type="danger" rounded>
Code ini untuk menghapus data pelanggan yang telah ditentukan dari database.
</larecipe-card>
---

```php
public function destroy($id)
{
    if (Gate::allows('admin')) {

        $data = Penggunaan::where('pelanggan_id', $id)->get()->first();

        if ($data) {

            Alert::warning('Perhatian', 'Data Pelanggan Mempunyai Relasi, Data Tidak dapat Dihapus!');

            return back();
        } else {

            Pelanggan::whereId($id)->delete();
            Alert::success('Sukses', 'Hapus Data Pelanggan Berhasil !');

            return redirect('pelanggan');
        }
    } else {
        return abort(403, 'Anda Tidak Memiliki Hak Akses!');
    }
}
```

---
