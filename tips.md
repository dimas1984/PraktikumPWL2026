# Tips Mengecek `$fillable` pada Model Laravel

`$fillable` digunakan untuk menentukan field apa saja yang boleh diisi menggunakan **Mass Assignment** seperti `create()` atau `update()`.

Jika `$fillable` tidak terbaca, biasanya akan muncul error seperti:

```
Illuminate\Database\Eloquent\MassAssignmentException
Add [field] to fillable property
```

---

## 1️⃣ Cek `$fillable` menggunakan Tinker

Masuk ke **Laravel Tinker**

```bash
php artisan tinker
```

Kemudian jalankan:

```php
(new App\Models\Country)->getFillable();
```

Jika berhasil akan muncul:

```php
[
  "name"
]
```

Jika hasilnya kosong:

```php
[]
```

berarti `$fillable` belum terbaca oleh Laravel.

---

## 2️⃣ Pastikan `$fillable` ada di Model

Contoh model yang benar:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
    ];
}
```

---

## 3️⃣ Refresh Autoload Composer

Jika `$fillable` sudah ditambahkan tetapi masih tidak terbaca, jalankan:

```bash
composer dump-autoload
php artisan optimize:clear
```

---

## 4️⃣ Pastikan File Model Sudah Disimpan

Kadang editor belum menyimpan perubahan.

Gunakan shortcut:

```
CTRL + S
```

Kemudian jalankan kembali Tinker.

---

## 5️⃣ Pastikan Namespace Model Benar

Di bagian atas model harus ada:

```php
namespace App\Models;
```

Jika namespace salah, Laravel tidak dapat membaca property `$fillable`.

---

## 6️⃣ Cara Debug Cepat

Gunakan perintah berikut di Tinker:

```php
$class = new App\Models\Country;
$class->getFillable();
```

atau

```php
dd((new App\Models\Country)->getFillable());
```

---

## 7️⃣ Solusi Sementara untuk Testing

Jika ingin memastikan error berasal dari `$fillable`, gunakan:

```php
protected $guarded = [];
```

Contoh:

```php
class Country extends Model
{
    protected $guarded = [];
}
```

⚠️ Catatan: Cara ini **tidak disarankan untuk production**.

---

## 📌 Kesimpulan

Jika `$fillable` tidak terbaca:

1. Pastikan `$fillable` sudah ditulis di model
2. Simpan file model
3. Jalankan `composer dump-autoload`
4. Jalankan `php artisan optimize:clear`
5. Cek kembali menggunakan Tinker

💡 Tips: Gunakan `getFillable()` di **Tinker** untuk memastikan Laravel membaca `$fillable` dengan benar.
