<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelAlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_alat');
            $table->string('no_lemari');
            $table->string('no_seri');
            $table->string('nama_alat');
            $table->string('tipe_alat');
            $table->string('merk');
            $table->string('kondisi_awal');
            $table->string('tgl_inventaris')->change();
            $table->string('kondisi_akhir');
            $table->string('nama_petugas');
            $table->string('status');
            $table->integer('kalibrasi');
            $table->string('kategori');
            $table->string('jam_pakai');
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
        Schema::dropIfExists('alat');
    }
}
