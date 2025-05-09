<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins'; // Nama tabel yang akan digunakan

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi ke tabel lain
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function konsultasi()
    {
        return $this->hasMany(Konsultasi::class);
    }
}
