<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'nik',
        'password',
        'jabatan',
        'status_user',
    ];

    //masih tanda tanya kenapa rekam ktp dan ikd tetap bisa manggil user
    public function cetakKtp()
    {
        return $this->hasMany(CetakKtp::class, 'id_user'); 
    }

    public function rekamKtp()
    {
        return $this->hasMany(RekamKtp::class, 'id_user'); 
    }

    public function ikd()
    {
        return $this->hasMany(Ikd::class, 'id_user'); 
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
