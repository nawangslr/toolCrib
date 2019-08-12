<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelAlat extends Model
{
    protected $table = "alat";
    protected $fillable = ['no_alat', 'no_lemari', 'no_seri', 'nama_alat', 'tipe_alat', 'merk', 'kondisi_awal', 'tgl_inventaris', 'kondisi_akhir', 'nama_petugas', 'status', 'jam_pakai'];
}
