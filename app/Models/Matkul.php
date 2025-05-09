<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    // Menentukan nama tabel di database
    protected $table = 'matkuls'; // Ganti dengan nama tabel yang sesuai jika berbeda

    // Menentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'kode',        // Kode matakuliah
        'matkul',      // Nama matakuliah
        'sks',         // SKS
        'kategori',    // Kategori matakuliah
        'smt',         // Semester
        'semester',    // Semester (apakah ini berbeda dengan 'smt'?)
        'id_prodi'     // ID Program Studi
    ];

    // Anda bisa menambahkan relasi jika ada
    // Misalnya jika ada relasi ke model lain, bisa ditambahkan di sini
    // Matkul.php
    public function khs()
    {
        return $this->hasMany(Khs::class, 'id_matkul');
}       

}
