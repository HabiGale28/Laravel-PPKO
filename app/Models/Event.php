<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $guarded = [];
    
    // Relasi ke user (penulis)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}