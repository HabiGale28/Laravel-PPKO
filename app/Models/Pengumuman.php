<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman'; // Nama tabel singular sesuai migrasi v2
    protected $fillable = ['judul', 'slug', 'konten', 'gambar', 'tanggal_publish', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}