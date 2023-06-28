<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class song extends Model
{
    protected $fillable = [
        'name', 
        'author', 
        'releasedate', 
        'duration', 
        'genre_id'
    ];
    use HasFactory;

    public function playlists() {
        return $this->belongsToMany(playlist::class);   
    }
    
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
