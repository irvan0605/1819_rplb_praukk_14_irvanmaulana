# Tarif

---

-   [Table](#section-1)
-   [Fillable](#section-2)
-   [Pelanggan](#section-3)

<larecipe-card type="primary" rounded>
Model ini untuk menghubungkan kedalam database berkaitan dengan data tarif.
</larecipe-card>

---

<a name="section-1"></a>

### Table

---

<larecipe-card type="warning" rounded>
Code ini mengacu kepada tabel tarif dari database.
</larecipe-card>

---

```php
protected $table = 'tarif';
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
    'kode_tarif',
    'golongan',
    'daya',
    'tarif_perkwh',
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
