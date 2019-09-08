<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelPinjamKoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjam_koin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alat_id');
            $table->string('tgl_pinjam');
            $table->string('no_koin');
            $table->string('no_alat');
            $table->string('nama_alat');
            $table->string('tgl_kembali');
            $table->string('kondisi');
            $table->string('keterangan');
            $table->string('status');
            $table->string('nama_petugas');
            $table->string('total_jam_pinjam');
            $table->string('total_menit_pinjam');
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
        Schema::dropIfExists('pinjam_koin');
    }
}
