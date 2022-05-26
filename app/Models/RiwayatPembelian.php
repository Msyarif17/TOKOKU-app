<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiwayatPembelian extends Model
{
    use HasFactory;
    
    protected $table = 'riwayat_pembelian';
    
    protected $fillable = ['nama_barang','harga_satuan','jumlah_barang','total_harga'];
    
    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
