# User

---

-   [Fillable](#section-1)
-   [Hidden](#section-2)

<larecipe-card type="primary" rounded>
Model ini untuk menghubungkan kedalam database berkaitan dengan data user.
</larecipe-card>

---

<a name="section-1"></a>

### Fillable

---

<larecipe-card type="success" rounded>
Code ini untuk mendaftarkan atribut yang bisa diisi ketika insert atau update ke database.
</larecipe-card>
---

```php
protected $fillable = [
    'nama_user',
    'username',
    'password',
    'nomor_telepon',
    'foto',
    'level_id',
];
```

---

<a name="section-2"></a>

### Table

---

<larecipe-card type="warning" rounded>
Code ini menyembunyikan atribut untuk array.
</larecipe-card>

---

```php
protected $hidden = [
    'password',
];
```

---
