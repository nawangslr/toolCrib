<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LaporanInventaris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_inventaris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_alat');
            $table->string('no_alat');
            $table->string('no_lemari');
            $table->string('nama_petugas');
            $table->string('kondisi');
            $table->date('tgl_inventaris');
            $table->string('catatan');
            $table->string('keterangan');
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
        Schema::dropIfExists('laporan_inventaris');
    }
}
