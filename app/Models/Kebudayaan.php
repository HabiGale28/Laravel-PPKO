<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebudayaan extends Model
{
    protected $fillable = [
        'judul', 'slug', 'kategori', 'deskripsi', 'gambar', 'user_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}