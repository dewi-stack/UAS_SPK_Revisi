<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;
    protected $table = 'cafes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'alamat',
        'suasana',
        'kenyamanan',
        'kualitas',
        'harga',
        'wifi',
        'pelayanan',
        'kebersihan',
        'lokasi',
        'menu_unik',
        'respon',
    ];
}
