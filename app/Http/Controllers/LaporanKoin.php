<?php

namespace App\Http\Controllers;

use App\ModelPinjamKoin;
use App\ModelPeminjam;
use App\ModelUser;
use App\ModelAlat;
use Illuminate\Http\Request;

class LaporanKoin extends Controller
{
    public function index() 
    {
        $data_pinjam_koin = ModelPinjamKoin::all();
        $peminjaman = ModelPeminjam::all();
        $peralatan = ModelAlat::all();
        return view('laporan_pinjam', compact('data_pinjam_koin','peralatan','peminjaman'));
    }
}
