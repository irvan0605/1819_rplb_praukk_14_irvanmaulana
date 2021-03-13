# Metode

---

-   [Table](#section-1)
-   [Pembayaran](#section-2)

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
