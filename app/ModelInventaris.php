<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelInventaris extends Model
{
    protected $table = "laporan_inventaris";
    protected $fillable = ['nama_alat', 'no_alat', 'no_lemari', 'nama_petugas', 'kondisi', 'tgl_inventaris', 'catatan', 'keterangan'];
}
