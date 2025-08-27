<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
   protected $table = 'pembelian';
    protected $primaryKey = 'pembelian_id';
    protected $fillable = ['pembelian_user_id','pembelian_metode_pembayaran_id','pembelian_tanggal','pembelian_total_harga'];

    public function detail() {
        return $this->hasMany(PembelianDetail::class, 'pembelian_detail_pembelian_id');
    }

   
}
