<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Destinasi extends Model
{
    // --- INI PERBAIKANNYA ---
    // Memberi tahu Laravel agar mencari tabel 'destinasi' (singular)
    protected $table = 'destinasi';
    // ------------------------------------

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'slug',
        'lokasi',
        'provinsi',
        'deskripsi',
        'wisata',
        'kebudayaan',
        'event',
        'gambar_utama',
        'latitude',
        'longitude',
        'harga_mulai',
        'user_id',
        'status',
        
        // Kolom tambahan (dari tahap sebelumnya, biarkan saja)
        'tipe_pariwisata',
        'deskripsi_singkat',
        'konten',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}