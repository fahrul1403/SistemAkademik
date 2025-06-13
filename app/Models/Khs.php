<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KHS extends Model
{
    use HasFactory;

    protected $table = 'khs'; // Nama tabel

    protected $fillable = [
        'id_user',
        'id_matkul',
        'semester',
        'tahun_akademik',
        'nilai_angka',
        'nilai_huruf',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul');
    }
}
