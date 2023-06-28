<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playlist extends Model
{
    protected $fillable = ['name'];
    use HasFactory;

    public function songs(){
        return $this->belongsToMany(song::class);
    }
}
