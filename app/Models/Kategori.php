<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ="kategori_barang";
    protected $fillable = ['nama','kode'];

    public function barang(){
        return $this->hasMany(Barang::class);
    }
}
