# Log

---

-   [Table](#section-1)
-   [Fillable](#section-2)

<larecipe-card type="primary" rounded>
Model ini untuk menghubungkan kedalam database berkaitan dengan data log.
</larecipe-card>

---

<a name="section-1"></a>

### Table

---

<larecipe-card type="warning" rounded>
Code ini mengacu kepada tabel log dari database.
</larecipe-card>

---

```php
protected $table = 'log';
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
    'nama_log',
    'tabel',
    'id_referensi',
    'user_id',
    'deskripsi',
];
```

---
