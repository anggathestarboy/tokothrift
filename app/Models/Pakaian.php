<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pakaian extends Model
{
    use HasFactory;

    protected $table = 'pakaian';
    protected $primaryKey = 'pakaian_id';

    protected $fillable = [
        'pakaian_kategori_pakaian_id',
        'pakaian_nama',
        'pakaian_harga',
        'pakaian_stok',
        'pakaian_gambar_url',
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Category::class, 'pakaian_kategori_pakaian_id', 'kategori_pakaian_id');
    }
public static function getPakaianByName(string $pakaian_nama)
{
    return self::with('kategori')
        ->where('pakaian_nama', 'like', '%' . $pakaian_nama . '%')
        ->get();
}

}
