<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPeminjam extends Model
{
    protected $table = "peminjam";
    protected $fillable = ['no_induk', 'no_koin', 'status', 'nama', 'jurusan', 'no_hp', 'foto'];
}
