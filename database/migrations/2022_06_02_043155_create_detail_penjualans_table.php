<?php

use App\Models\Barang;
use App\Models\RiwayatPenjualan;
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
        Schema::create('detail_penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(RiwayatPenjualan::class);
            $table->foreignIdFor(Barang::class);
            $table->unsignedBigInteger('jumlah_barang');
            $table->unsignedBigInteger('total');
            $table->boolean('is_discount')->default(0);
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
        Schema::dropIfExists('detail_penjualans');
    }
};
