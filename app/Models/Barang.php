<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Supplyer;
use App\Models\RiwayatPembelian;
use App\Models\RiwayatPenjualan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'barang';
    
    protected $fillable = [
        'kode','id_supplyer','nama','kategori_id',
        'harga_beli_satuan','harga_jual_satuan',
        'kadaluarsa','discount','stok','barcode_img','img'
    ];
    
    public function discount(){
        // harus berbentuk array 
        $discount = json_decode($this->discount);

        $harga = $this->harga_jual_satuan;
        
        foreach($discount as $d){
            $harga =  $harga - $harga* $d;
        }

        return $harga;
    }
    
    public function cekStok(){
        return $this->where('stok',0)->get()->all();
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
    
    public function supplyer(){
        return $this->belongsTo(Supplyer::class);
    }
    
    public function riwayatPenjualan(){
        return $this->hasMany(RiwayatPenjualan::class,'id_barang');
    }
    
    public function riwayatPembelian(){
        return $this->hasMany(RiwayatPembelian::class);
    }
}
