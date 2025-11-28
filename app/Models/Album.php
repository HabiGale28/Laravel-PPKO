<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['nama_album', 'slug', 'deskripsi', 'cover_album', 'user_id'];

    // Relasi: 1 Album punya banyak Foto
    public function fotos() {
        return $this->hasMany(Foto::class);
    }
}