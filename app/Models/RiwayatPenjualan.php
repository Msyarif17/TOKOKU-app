<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPenjualan extends Model
{
    use HasFactory;
    protected $table = 'riwayat_penjualan';
    protected $fillable = ['jumlah_barang','total','laba','tx_id'];
    public function detailPenjualan(){
        return $this->hasMany(DetailPenjualan::class);
    }

}
