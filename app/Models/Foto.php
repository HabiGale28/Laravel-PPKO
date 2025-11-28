<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = ['album_id', 'judul_foto', 'file_foto'];
}