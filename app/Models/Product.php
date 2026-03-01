<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi secara massal.
     * Sesuaikan dengan field di migrasi tadi.
     * SKU adalah singkatan dari Stock Keeping Unit. 
     * Kalau diartikan secara bebas, ini adalah kode unik yang diberikan 
     * untuk setiap jenis barang di toko atau gudang kamu.
     * contoh SKU
     * Produk: Kaos Polos Uniqlo Warna Hitam Ukuran XL
     * SKU: UNQ-KPS-BLK-XL
     */
    protected $fillable = [
        'name',
        'sku',
        'description',
        'price',
        'stock',
        'image',
        'is_active',
        'is_featured',
    ];

    /**
     * Casting tipe data (Opsional tapi disarankan)
     * Agar Laravel otomatis mengubah string dari DB menjadi tipe data yang benar.
     */
    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'price' => 'integer',
        'stock' => 'integer',
    ];
}