<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmkmSubmission extends Model
{
    use HasFactory;

    // Nama tabel akan dianggap 'umkm_submissions'
    
    protected $fillable = [
        'user_id', // ID user yang mengajukan
        'nama_usaha',
        'jenis_usaha',
        'foto_produk_path',
        'status', // Pending | Ditolak | Diterima
        'catatan_admin',
    ];

    // Relasi ke User (setiap pengajuan dimiliki oleh satu User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}