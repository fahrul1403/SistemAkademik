<?php
// app/Models/OrangTuaMahasiswa.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTuaMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'orang_tua_mahasiswa';

    // Definisikan relasi dengan model User
    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    // Anda juga bisa mendefinisikan relasi orang tua jika diperlukan
    public function orangTua()
    {
        return $this->belongsTo(User::class, 'orang_tua_id');
    }
}
