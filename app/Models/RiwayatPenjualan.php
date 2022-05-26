<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPenjualan extends Model
{
    use HasFactory;
    protected $table = 'riwayat_penjualan';
    protected $fillable = ['id_barang','harga','jumlah_barang','total','tx_id'];
    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
