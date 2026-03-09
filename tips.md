# Tips Mengecek `$fillable` pada Model Laravel

`$fillable` digunakan untuk menentukan field apa saja yang boleh diisi menggunakan **mass assignment** seperti `create()` atau `update()`.

Jika `$fillable` tidak terbaca, biasanya akan muncul error:
Illuminate\Database\Eloquent\MassAssignmentException
Add [field] to fillable property

Berikut beberapa cara untuk mengeceknya.

---

## 1. Cek `$fillable` menggunakan Tinker

Masuk ke **Laravel Tinker**:

```bash
php artisan tinker
Lalu jalankan:
(new App\Models\Country)->getFillable();
Jika berhasil akan muncul:

[
    "name"
]

Jika hasilnya:

[]

berarti $fillable belum terbaca oleh Laravel.

2. Pastikan $fillable ada di Model

Contoh model yang benar:

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
    ];
}
3. Refresh Autoload Composer

Jika $fillable sudah ditambahkan tetapi masih kosong, jalankan:

composer dump-autoload
php artisan optimize:clear

Kemudian cek kembali dengan Tinker.

4. Pastikan File Model Sudah Disimpan

Kadang editor belum menyimpan perubahan.

Tekan:

CTRL + S

lalu jalankan kembali Tinker.

5. Cek Namespace Model

Pastikan namespace model benar:

namespace App\Models;

Jika namespace salah, Laravel tidak akan membaca property $fillable.

6. Cara Debug Cepat

Gunakan perintah berikut di Tinker:

$class = new App\Models\Country;
$class->getFillable();

atau

dd((new App\Models\Country)->getFillable());
7. Solusi Sementara (Testing)

Jika ingin memastikan error berasal dari $fillable, gunakan:

protected $guarded = [];

Contoh:

class Country extends Model
{
    protected $guarded = [];
}

Namun cara ini tidak disarankan untuk production.

Kesimpulan

Jika $fillable tidak terbaca:

Pastikan $fillable sudah ditulis di model

Simpan file model

Jalankan composer dump-autoload

Jalankan php artisan optimize:clear

Cek kembali menggunakan Tinker