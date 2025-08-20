<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;

    public $primaryKey = 'user_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'user_username',
        'user_password',
        'user_fullname',
        'user_email',
        'user_nohp',
        'user_alamat',
        'user_profil_url',
        'user_level',
    ];

    protected $hidden = [
        'user_password',
        'remember_token',
    ];

    // penting untuk autentikasi
    public function getAuthPassword()
    {
        return $this->user_password;
    }


    public static function getUserByEmail (string $user_email) {
    $user = self::where('user_email', $user_email)->first();

    return $user;
}
}
