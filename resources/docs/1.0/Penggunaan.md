# Penggunaan

---

-   [Table](#section-1)
-   [Fillable](#section-2)
-   [Pelanggan](#section-3)
-   [Tagihan](#section-4)
-   [Format Meter](#section-5)

<larecipe-card type="primary" rounded>
Model ini untuk menghubungkan kedalam database berkaitan dengan data penggunaan.
</larecipe-card>

---

<a name="section-1"></a>

### Table

---

<larecipe-card type="warning" rounded>
Code ini mengacu kepada tabel penggunaan dari database.
</larecipe-card>

---

```php
protected $table = 'penggunaan';
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
    'id',
    'pelanggan_id',
    'bulan',
    'tahun',
    'meter_awal',
    'meter_akhir',
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

### Tagihan

---

<larecipe-card type="primary" rounded>
Code ini untuk merelasikan ke model tagihan.
</larecipe-card>
---

```php
public function tagihan()
{
    return $this->hasOne(Tagihan::class);
}
```

---

<a name="section-5"></a>

### Format Meter

---

<larecipe-card type="warning" rounded>
Code ini untuk membuat format nomor meter.
</larecipe-card>
---

```php
public function formatMeter($value)
{
    return sprintf("%08d", $value);
}
```

---
