<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CetakKtp extends Model
{
    use HasFactory;

    // supaya laravel tidak mengubah nama tabel menjadi 'cetak_ktps'
    protected $table = 'cetak_ktp';

    // Field yang boleh diisi
    protected $fillable = [
        'kode_pao',
        'nik_cetak',
        'nama_cetak',
        'rt',
        'ket_cetak',
        'status_cetak',
        'keterangan',
        'tanggal_pao',
        'tanggal_ambil',
        'tanda_terima',
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
