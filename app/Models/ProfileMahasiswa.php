<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'profile_mahasiswa'; // Nama tabel

    protected $fillable = [
        'user_id',
        'nama',
        'nim',
        'prodi',
        'fakultas',
        'alamat',
        'no_hp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
