# Pelanggan

---

-   [Up](#section-1)
-   [Down](#section-2)

<larecipe-card type="primary" rounded>
Migrasi Untuk Membuat Tabel Pelanggan.
</larecipe-card>

---

<a name="section-1"></a>

### Up

---

<larecipe-card type="warning" rounded>
Code ini untuk menjalankan migrasi.
</larecipe-card>

---

```php
public function up()
{
    Schema::create('pelanggan', function (Blueprint $table) {
        $table->id();
        $table->string('nomor_meter', 12);
        $table->string('nama_pelanggan', 50);
        $table->string('alamat');
        $table->foreignId('tarif_id')->constrained('tarif');
        $table->timestamps();
    });
}
```

---

<a name="section-2"></a>

### Down

---

<larecipe-card type="success" rounded>
Code ini untuk membalikkan migrasi
</larecipe-card>
---

```php
public function down()
{
    Schema::dropIfExists('pelanggan');
}
```

---
