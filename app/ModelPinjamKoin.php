<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ModelPinjamKoin extends Model
{
    protected $table = "pinjam_koin";

    public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->formatLocalized('%A, %d %B %Y %H:%I:%S');
    }
}