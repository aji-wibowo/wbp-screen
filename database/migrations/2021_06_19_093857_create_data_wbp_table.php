<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataWbpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_wbp', function (Blueprint $table) {
            $table->id();
            $table->string('no_reg_instansi')->nullable();
            $table->string('nama')->nullable();
            $table->string('agama')->nullable();
            $table->string('jenis_kejahatan')->nullable();
            $table->string('tgl_ekspirasi')->nullable();
            $table->string('lokasi_blok')->nullable();
            $table->string('lokasi_sel')->nullable();
            $table->string('golongan_registrasi')->nullable();
            $table->string('total_hukuman')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('data_wbp');
    }
}
