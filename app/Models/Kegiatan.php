<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kegiatan extends Model
{
    // use HasFactory;

    use SoftDeletes;

    protected $table = 'kegiatan';

    protected $fillable = [
        'nama_kegiatan'
    ];

    public function ruangan(){
        return $this->hasMany(Ruangan::class, 'kegiatan_id');
    }

    public function user(){
        return $this->belongsToMany(User::class, 'user_kegiatan');
    }
}
