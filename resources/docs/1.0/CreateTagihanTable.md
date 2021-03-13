# Tagihan

---

-   [Up](#section-1)
-   [Down](#section-2)

<larecipe-card type="primary" rounded>
Migrasi Untuk Membuat Tabel Tagihan.
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
    Schema::create('tagihan', function (Blueprint $table) {
        $table->id();
        $table->foreignId('penggunaan_id')->constrained('penggunaan');
        $table->foreignId('pelanggan_id')->constrained('pelanggan');
        $table->string('bulan', 10);
        $table->year('tahun');
        $table->integer('jumlah_meter');
        $table->integer('jumlah_bayar');
        $table->string('status', 20);
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
    Schema::dropIfExists('tagihan');
}
```

---
