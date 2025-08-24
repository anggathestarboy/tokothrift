<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
     use HasFactory;

    protected $table = 'kategori_pakaian'; // nama tabel

    protected $primaryKey = 'kategori_pakaian_id'; // primary key



    protected $fillable = [
        'kategori_pakaian_nama',
    ];
}
