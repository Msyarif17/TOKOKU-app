<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPenjualan extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['riwayat_penjualan_id','barang_id','jumlah_barang','total','is_discount'];
    public function barang(){
        return $this->belongsTo(Barang::class);
    }
    public function riwayatPenjualan(){
        return $this->belongsTo(RiwayatPenjualan::class);
    }
    
}
