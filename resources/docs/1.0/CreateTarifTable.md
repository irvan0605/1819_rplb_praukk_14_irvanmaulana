# Tarif

---

-   [Up](#section-1)
-   [Down](#section-2)

<larecipe-card type="primary" rounded>
Migrasi Untuk Membuat Tabel Tarif.
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
    Schema::create('tarif', function (Blueprint $table) {
        $table->id();
        $table->string('kode_tarif', 20);
        $table->string('golongan', 10);
        $table->string('daya', 10);
        $table->integer('tarif_perkwh');
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
    Schema::dropIfExists('tarif');
}
```

---
