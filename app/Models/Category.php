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

    public static function getCategoryByName (string $kategori_pakaian_nama) {
    $categories = self::where('kategori_pakaian_nama', 'like', '%' . $kategori_pakaian_nama . '%')->get();

    return $categories;
}

public function pakaian()
    {
        return $this->hasMany(Pakaian::class, 'kategori_pakaian_id', 'pakaian_id');
    }

}
