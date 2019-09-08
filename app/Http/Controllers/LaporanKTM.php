<?php

namespace App\Http\Controllers;

use App\ModelPinjamKoin;
use App\ModelPeminjam;
use App\ModelUser;
use App\ModelAlat;
use Illuminate\Http\Request;

class LaporanKTM extends Controller
{
    public function index() 
    {
        $data_pinjam_ktm = ModelPinjamKoin::all();
        $peminjaman = ModelPeminjam::all();
        $peralatan = ModelAlat::all();
        return view('laporan_pinjam_ktm', compact('data_pinjam_ktm','peralatan','peminjaman'));
    }
}
