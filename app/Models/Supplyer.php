<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplyer extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'supplyers';
    protected $fillable = ['nama','alamat','nomor_telepon'];
    public function barang(){
        return $this->hasMany(Barang::class,'id_supplyer'); 
    }
}
