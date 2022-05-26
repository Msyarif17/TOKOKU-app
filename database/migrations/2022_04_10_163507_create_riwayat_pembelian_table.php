<?php

use App\Models\Barang;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pembelian', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Barang::class);
            $table->decimal('harga_satuan',9,2)->unsigned();
            $table->unsignedInteger('jumlah_barang');
            $table->decimal('total_harga',9,2)->unsigned();
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
        Schema::dropIfExists('riwayat_pembelian');
    }
};
