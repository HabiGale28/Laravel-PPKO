<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    // PERBAIKAN: Sesuaikan dengan nama tabel di database (jamak)
    protected $table = 'beritas'; 
    
    protected $guarded = [];

    public function kategori()
    {
        // Asumsi nama tabel kategori Anda 'kategori_berita' atau 'kategori_beritas'
        // Sesuaikan foreign key jika perlu, defaultnya 'kategori_berita_id'
        return $this->belongsTo(KategoriBerita::class, 'kategori_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}