# DashboardController

---

-   [Code](#section-1)
-   [Index](#section-2)

<larecipe-card type="primary" rounded>
Controller Ini Untuk Menampilkan view Dashboard Untuk User Admin, Bank, dan Pelanggan.
</larecipe-card>

---

<a name="section-1"></a>

## Code

---

<larecipe-card type="warning" rounded>
Code berikut ini digunakan untuk memanggil file yang memiliki class terkait.
</larecipe-card>

---

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

```

---

<a name="section-2"></a>

### Index

---

<larecipe-card type="success" rounded>
Code ini untuk menampilkan Dashboard Untuk User Admin, Bank, dan Pelanggan.
</larecipe-card>
---

```php
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

```

---
