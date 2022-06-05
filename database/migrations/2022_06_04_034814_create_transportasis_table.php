<?php

use App\Models\KategoriTransportasi;
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
        Schema::create('transportasis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(KategoriTransportasi::class);
            $table->stringa('nama_kendaraan');
            $table->string('nomor_kendaraan');
            $table->timestamp('pajak_kendaraan');
            $table->softDeletes();
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
        Schema::dropIfExists('transportasis');
    }
};
