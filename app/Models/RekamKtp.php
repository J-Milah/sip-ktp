<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamKtp extends Model
{
    use HasFactory;

    // pastikan laravel tidak mengubah menjadi 'rekam_ktps'
    protected $table = 'rekam_ktp';

    protected $fillable = [
        'nama_rekam',
        'nik_rekam',
        'alamat',
        'rt',
        'tanggal_rekam',
        'id_user',
        'id_lurah',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_lurah');
    }
}
