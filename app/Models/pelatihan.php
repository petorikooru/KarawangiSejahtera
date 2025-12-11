<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    // 1. Tentukan nama tabel jika nama model tidak sesuai dengan konvensi (misal: 'pelatihans')
    // protected $table = 'nama_tabel_pelatihan'; 

    // 2. Tentukan kolom mana saja yang boleh diisi (mass assignment)
    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'kuota',
        'status', // Contoh: aktif/nonaktif
    ];

    // 3. Jika Anda ingin menonaktifkan fitur timestamps (created_at dan updated_at)
    // public $timestamps = false;
    
    // 4. Tambahkan relasi jika diperlukan
    // public function peserta()
    // {
    //     return $this->hasMany(PesertaPelatihan::class);
    // }
}