<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    protected $table = 'metode_pembayaran';
    protected $primaryKey = 'metode_pembayaran_id';


    protected $fillable = [
        'metode_pembayaran_user_id',
        'metode_pembayaran_jenis',
        'metode_pembayaran_nomor'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'metode_pembayaran_user_id');
    }

   
}