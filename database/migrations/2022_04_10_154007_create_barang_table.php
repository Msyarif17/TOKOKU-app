<?php

use App\Models\Kategori;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migration
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kategori::class);
            $table->integer('kode');
            $table->unsignedBigInteger('id_supplyer');
            $table->foreign('id_supplyer')->references('id')->on('supplyers');
            $table->string('nama');
            $table->bigInteger('harga_beli_satuan')->unsigned();
            $table->bigInteger('harga_jual_satuan')->unsigned()->nullable();
            $table->timestamp('kadaluarsa')->nullable();
            $table->json('discount');
            $table->integer('stok')->default(0)->unsigned();
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
        Schema::dropIfExists('barang');
    }
};
