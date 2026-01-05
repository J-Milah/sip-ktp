<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $fillable = ['nama_kelurahan'];

    public function cetakKtp()
    {
        return $this->hasMany(CetakKtp::class, 'id_lurah');
    }

    public function rekamKtp()
    {
        return $this->hasMany(RekamKtp::class, 'id_lurah');
    } 
}
