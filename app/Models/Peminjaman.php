<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peminjaman extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id', 'ruangan_id', 'surat_permohonan_pinjaman', 'status_peminjaman'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function ruangan(){
        return $this->belongsTo(Ruangan::class, 'ruangan_id', 'id');
    }
}
