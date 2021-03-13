# Tagihan

---

-   [Table](#section-1)
-   [Fillable](#section-2)
-   [Pelanggan](#section-3)
-   [Penggunaan](#section-4)
-   [Pembayaran](#section-5)

<larecipe-card type="primary" rounded>
Model ini untuk menghubungkan kedalam database berkaitan dengan data tagihan.
</larecipe-card>

---

<a name="section-1"></a>

### Table

---

<larecipe-card type="warning" rounded>
Code ini mengacu kepada tabel tagihan dari database.
</larecipe-card>

---

```php
protected $table = 'tagihan';
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
    'penggunaan_id',
    'pelanggan_id',
    'bulan',
    'tahun',
    'jumlah_meter',
    'jumlah_bayar',
    'status',
];
```

---

<a name="section-3"></a>

### Pelanggan

---

<larecipe-card type="info" rounded>
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

<a name="section-4"></a>

### Penggunaan

---

<larecipe-card type="primary" rounded>
Code ini untuk merelasikan ke model penggunaan.
</larecipe-card>
---

```php
public function penggunaan()
{
    return $this->belongsTo(Penggunaan::class);
}
```

---

<a name="section-5"></a>

### Pembayaran

---

<larecipe-card type="warning" rounded>
Code ini untuk merelasikan ke model pembayaran.
</larecipe-card>
---

```php
public function pembayaran()
{
    return $this->hasOne(Pembayaran::class);
}
```

---
