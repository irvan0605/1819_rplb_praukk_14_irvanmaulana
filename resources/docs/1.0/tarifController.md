# TarifController

---

-   [Code](#section-1)
-   [Index](#section-2)
-   [Create](#section-3)
-   [Store](#section-4)
-   [Edit](#section-5)
-   [Update](#section-6)
-   [Destroy](#section-7)

<larecipe-card type="primary" rounded>
Controller Ini Untuk Menghubungkan Model dengan View Halaman Kelola Tarif.
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
use App\Models\Tarif;
use App\Models\Pelanggan;

```

---

<a name="section-2"></a>

### Index

---

<larecipe-card type="info" rounded>
Code ini untuk menampilkan data tarif dari database.
</larecipe-card>
---

```php
public function index()
    {
    if (Gate::allows('admin')) {

        $data = Tarif::all();

        return view('admin.tarif', compact('data'));
    } elseif (Gate::allows('pelanggan')) {

        $data = Tarif::all();

        return view('pelanggan.tarif', compact('data'));
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
Code ini untuk menampilkan form untuk membuat data tarif baru.
</larecipe-card>
---

```php
public function create()
{
    if (Gate::allows('admin')) {

        return view('admin.tarif_add');
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
Code ini untuk menyimpan data tarif yang baru dibuat di database.
</larecipe-card>
---

```php
public function store(Request $request)
{
    $data = [
        'kode_tarif'   => $request->golongan . '/' . $request->daya,
        'golongan'     => $request->golongan,
        'daya'         => $request->daya,
        'tarif_perkwh' => $request->tarif_perkwh,
    ];

    $rules = [
        'kode_tarif'    => ['unique:tarif'],
        'golongan'      => ['required'],
        'daya'          => ['required'],
        'tarif_perkwh'  => ['required'],
    ];

    $messages = [
        'kode_tarif.unique'      => 'Golongan dan Daya sudah tersedia.',
        'golongan.required'      => 'Golongan wajib diisi.',
        'daya.required'          => 'Daya wajib diisi.',
        'tarif_perkwh.required'  => 'Tarif wajib diisi.',
    ];

    $validator =  Validator::make($data, $rules, $messages);
    $validator->validate();

    $tarif = Tarif::create($data);
    Alert::success('Sukses', 'Tambah Data Tarif Berhasil !');

    return redirect('tarif');
}
```

---

<a name="section-5"></a>

### Edit

---

<larecipe-card type="primary" rounded>
Code ini untuk menampilkan form untuk mengedit data tarif yang telah ditentukan.
</larecipe-card>
---

```php
public function edit($id)
{
    if (Gate::allows('admin')) {

        $tarif = Tarif::find($id);

        return view('admin.tarif_edit', compact('tarif'));
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
Code ini untuk memperbarui data tarif yang telah ditentukan di database.
</larecipe-card>
---

```php
public function update(Request $request, $id)
{
    $data = [
        'kode_tarif'   => $request->golongan . '/' . $request->daya,
        'golongan'     => $request->golongan,
        'daya'         => $request->daya,
        'tarif_perkwh' => $request->tarif_perkwh,
    ];

    $getTarif = Tarif::find($id);
    if ($data['kode_tarif'] == $getTarif['kode_tarif']) {
        $rules_kode = ['required'];
    } else {
        $rules_kode = ['required', 'unique:tarif'];
    }

    $rules = [
        'kode_tarif'    => $rules_kode,
        'golongan'      => ['required'],
        'tarif_perkwh'  => ['required'],
    ];

    $messages = [
        'kode_tarif.unique'      => 'Golongan dan Daya sudah tersedia.',
        'golongan.required'      => 'Golongan wajib diisi.',
        'tarif_perkwh.required'  => 'Tarif wajib diisi.',
    ];

    $validator =  Validator::make($data, $rules, $messages);
    $validator->validate();

    $tarif = Tarif::whereId($id)->first();
    $tarif->update($data);

    Alert::success('Sukses', 'Edit Data Tarif Berhasil !');
    return redirect('tarif');
}
```

---

<a name="section-7"></a>

### Destroy

---

<larecipe-card type="danger" rounded>
Code ini untuk menghapus data tarif yang telah ditentukan dari database.
</larecipe-card>
---

```php
public function destroy($id)
{
    //
    if (Gate::allows('admin')) {
        $data = Pelanggan::where('tarif_id', $id)->get()->first();

        if ($data) {

            Alert::warning('Perhatian', 'Data Tarif Mempunyai Relasi, Data Tidak dapat Dihapus!');

            return back();
        } else {
            Tarif::whereId($id)->delete();
            Alert::success('Sukses', 'Hapus Data Tarif Berhasil !');

            return back();
        }
    } else {
        return abort(403, 'Anda Tidak Memiliki Hak Akses!');
    }
}
```

---
