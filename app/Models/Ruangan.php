<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ruangan extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = 'ruangan';

    protected $fillable = [
        'ruangan', 'kegiatan_id', 'kapasitas', 'hari',
        'waktu_awal', 'waktu_akhir', 'status'
    ];


    // one to many
    public function kegiatan(){
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'id');
    }

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class, 'ruangan_id');
    }
}
