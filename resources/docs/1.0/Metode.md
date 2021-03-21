# Metode

---

-   [Table](#section-1)
-   [Pembayaran](#section-2)
-   [getNamaMetodeAttribute](#section-3)

<larecipe-card type="primary" rounded>
Model ini untuk menghubungkan kedalam database berkaitan dengan data metode.
</larecipe-card>

---

<a name="section-1"></a>

### Table

---

<larecipe-card type="warning" rounded>
Code ini mengacu kepada tabel metode dari database.
</larecipe-card>

---

```php
protected $table = 'metode';
```

---

<a name="section-2"></a>

### Pembayaran

---

<larecipe-card type="info" rounded>
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

<a name="section-3"></a>

### getNamaMetodeAttribute

---

<larecipe-card type="danger" rounded>
Code ini untuk membuat huruf pertama kapital.
</larecipe-card>
---

```php
 public function getNamametodeAttribute($value)
{
    return ucfirst($value);
}
```

---
