# Pembayaran

---

-   [Table](#section-1)
-   [Fillable](#section-2)
-   [Tagihan](#section-3)
-   [Metode](#section-4)
-   [Pelanggan](#section-5)

<larecipe-card type="primary" rounded>
Model ini untuk menghubungkan kedalam database berkaitan dengan data pembayaran.
</larecipe-card>

---

<a name="section-1"></a>

### Table

---

<larecipe-card type="warning" rounded>
Code ini mengacu kepada tabel pembayaran dari database.
</larecipe-card>

---

```php
protected $table = 'pembayaran';
```

---

<a name="section-2"></a>

### Fillable

---

<larecipe-card type="success" rounded>
Code ini untuk mendaftarkan atribut yang bisa diisi ketika insert atau update ke database.
</larecipe-card>
---

```php
protected $fillable = [
    'tagihan_id',
    'pelanggan_id',
    'tanggal_pembayaran',
    'bulan_bayar',
    'tahun_bayar',
    'biaya_admin',
    'total_bayar',
    'metode_id',
    'status',
    'bukti_bayar',
    'user_id',
];
```

---

<a name="section-3"></a>

### Tagihan

---

<larecipe-card type="info" rounded>
Code ini untuk merelasikan ke model tagihan.
</larecipe-card>
---

```php
public function tagihan()
{
    return $this->belongsTo(Tagihan::class);
}
```

---

<a name="section-4"></a>

### Metode

---

<larecipe-card type="primary" rounded>
Code ini untuk merelasikan ke model metode.
</larecipe-card>
---

```php
public function metode()
{
    return $this->belongsTo(Metode::class);
}
```

---

<a name="section-5"></a>

### Pelanggan

---

<larecipe-card type="warning" rounded>
Code ini untuk merelasikan ke model pelanggan.
</larecipe-card>
---

```php
public function pelanggan()
{
    return $this->belongsTo(Pelanggan::class);
}
```

---
