<?php

use App\Models\JobDeskPegawai;
use App\Models\Pegawai;
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
        Schema::create('detail_job_desk_pegawais', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(JobDeskPegawai::class);
            $table->foreignIdFor(Pegawai::class);
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
        Schema::dropIfExists('detail_job_desk_pegawais');
    }
};
