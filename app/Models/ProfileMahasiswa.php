<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;  // Import User model

class ProfileMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'profile_mahasiswa'; // Nama tabel

    protected $fillable = [
        'user_id',
        'nim',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'fakultas',
        'prodi',
        'angkatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
