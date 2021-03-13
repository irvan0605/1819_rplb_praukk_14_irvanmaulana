# Metode

---

-   [Up](#section-1)
-   [Down](#section-2)

<larecipe-card type="primary" rounded>
Migrasi Untuk Membuat Tabel Metode.
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
    Schema::create('metode', function (Blueprint $table) {
        $table->id();
        $table->string('nama_metode');
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
    Schema::dropIfExists('metode');
}
```

---
