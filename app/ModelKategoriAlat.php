<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelKategoriAlat extends Model
{
    protected $table = "kategori_alat";

    public function alat()
    {
        return $this->hasMany('App\ModelAlat', 'kategori_alat_id');
    }    
}
