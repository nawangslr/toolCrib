<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelPeminjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('peminjam', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tgl_pinjam');
            $table->string('no_koin');
            $table->string('no_alat');
            $table->string('nama_alat');
            $table->string('tgl_kembali');
            $table->string('kondisi');
            $table->string('keterangan');
            $table->string('status');
            $table->string('tahun_pinjam');
            $table->string('bulan_pinjam');
            $table->string('hari_pinjam');
            $table->string('jam_pinjam');
            $table->string('menit_pinjam');
            $table->string('jmlhjam_pinjam');
            $table->string('jmlhmenit_pinjam');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::dropIfExists('peminjam');*/
    }
}
