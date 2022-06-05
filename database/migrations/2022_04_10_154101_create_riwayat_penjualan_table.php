<?php

use App\Models\DetailPenjualan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('jumlah_barang')->nullable();
            $table->decimal('total')->nullable();
            // laba didapat dari (harga jual - harga beli)*jumlah barang
            $table->unsignedBigInteger('laba')->nullable();
            $table->string('alamat');
            $table->string('nama_penerima');
            $table->string('no_telepon_penerima');
            $table->string('tx_id')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_penjualan');
    }
};
