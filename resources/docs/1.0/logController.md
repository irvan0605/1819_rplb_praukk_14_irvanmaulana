# LogController

---

-   [Code](#section-1)
-   [Index](#section-2)
-   [Destroy](#section-3)

<larecipe-card type="primary" rounded>
Controller Ini Untuk Menghubungkan Model dengan View Halaman Activity Log.
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Alert;
use App\Models\Log;

```

---

<a name="section-2"></a>

### Index

---

<larecipe-card type="info" rounded>
Code ini untuk menampilkan data log dari database.
</larecipe-card>
---

```php
public function index()
{
    if (Gate::allows('admin')) {

        $log = DB::select('SELECT * FROM activity_log ORDER BY id DESC');

        return view('admin.log', compact('log'));
    } else {
        return abort(403, 'Anda Tidak Memiliki Hak Akses!');
    }
}
```

---

<a name="section-3"></a>

### Destroy

---

<larecipe-card type="danger" rounded>
Code ini untuk menghapus data log yang telah ditentukan dari database.
</larecipe-card>
---

```php
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
```

---
