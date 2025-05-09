<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi'; // Nama tabel sesuai skema database

    protected $fillable = [
        'judul',
        'pesan',
        'created_at', // Pastikan kolom ini ada di skema migrasi
        'updated_at',
    ];

    // Tambahkan relasi atau fungsi tambahan di sini jika diperlukan
}