# Pelanggan

---

-   [Table](#section-1)
-   [Fillable](#section-2)
-   [Tarif](#section-3)
-   [Penggunaan](#section-4)
-   [Tagihan](#section-5)
-   [Pembayaran](#section-6)

<larecipe-card type="primary" rounded>
Model ini untuk menghubungkan ke dalam database berkaitan dengan data pelanggan.
</larecipe-card>

---

<a name="section-1"></a>

### Table

---

<larecipe-card type="warning" rounded>
Code ini mengacu kepada tabel pelanggan dari database.
</larecipe-card>

---

```php
protected $table = 'pelanggan';
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
    'nomor_meter',
    'nama_pelanggan',
    'alamat',
    'tarif_id',
];
```

---

<a name="section-3"></a>

### Tarif

---

<larecipe-card type="info" rounded>
Code ini untuk merelasikan ke model tarif.
</larecipe-card>
---

```php
public function tarif()
{
    return $this->belongsTo(Tarif::class);
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
    return $this->hasMany(Penggunaan::class);
}
```

---

<a name="section-5"></a>

### Tagihan

---

<larecipe-card type="warning" rounded>
Code ini untuk merelasikan ke model tagihan.
</larecipe-card>
---

```php
public function tagihan()
{
    return $this->hasMany(Tagihan::class);
}
```

---

<a name="section-6"></a>

### Pembayaran

---

<larecipe-card type="success" rounded>
Code ini untuk merelasikan ke model pembayaran.
</larecipe-card>
---

```php
public function pembayaran()
{
    return $this->hasMany(Pembayaran::class);
}
```

---
