# Pembayaran

---

-   [Up](#section-1)
-   [Down](#section-2)

<larecipe-card type="primary" rounded>
Migrasi Untuk Membuat Tabel Pembayaran.
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
    Schema::create('pembayaran', function (Blueprint $table) {
        $table->id();
        $table->foreignId('tagihan_id')->constrained('tagihan');
        $table->foreignId('pelanggan_id')->constrained('pelanggan');
        $table->date('tanggal_pembayaran');
        $table->string('bulan_bayar', 10);
        $table->year('tahun_bayar');
        $table->integer('biaya_admin');
        $table->integer('total_bayar');
        $table->foreignId('metode_id')->constrained('metode');
        $table->string('status', 20);
        $table->string('bukti_bayar');
        $table->foreignId('user_id')->constrained('users');
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
    Schema::dropIfExists('pembayaran');
}
```

---
