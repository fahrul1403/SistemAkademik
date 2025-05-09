<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi
    protected $table = 'pembayaran';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'user_id',
        'jumlah',
        'status',
        'bukti_pembayaran',
        'snap_token'
    ];

    // Definisikan relasi jika ada
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
