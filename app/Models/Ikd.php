<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ikd extends Model
{
    protected $table = 'ikd';

    // Field yang boleh diisi
    protected $fillable = [
        'nama_ikd',
        'nik_ikd',
        'tanggal_ikd',
        'id_user',
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
