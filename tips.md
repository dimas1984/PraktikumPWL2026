# Tips Mengecek `$fillable` pada Model Laravel

`$fillable` digunakan untuk menentukan field apa saja yang boleh diisi menggunakan **Mass Assignment** seperti `create()` atau `update()`.

Jika `$fillable` tidak terbaca, biasanya akan muncul error seperti:

Illuminate\Database\Eloquent\MassAssignmentException
Add [field] to fillable property


---

# 1️⃣ Cek `$fillable` menggunakan Tinker

Masuk ke **Laravel Tinker**

```bash
php artisan tinker

Kemudian jalankan:

(new App\Models\Country)->getFillable();

Jika berhasil akan muncul:

[
  "name"
]