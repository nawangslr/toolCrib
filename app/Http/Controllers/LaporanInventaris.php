<?php

namespace App\Http\Controllers;

use App\ModelUser;
use App\ModelAlat;
use App\ModelInventaris;
use Illuminate\Http\Request;

class LaporanInventaris extends Controller
{
    public function index()
    {
        $data_alat = ModelAlat::all();
        $admin = ModelUser::all();
        $data_inventaris = ModelInventaris::all();
        return view('laporan_inventaris', compact('data_alat','admin','data_inventaris'));
    }

    public function inventarisCreate(Request $request)
    {
        $data_inventaris = new ModelInventaris();
        $data_inventaris->nama_alat = $request->nama_alat;
        $data_inventaris->no_alat = $request->no_alat;
        $data_inventaris->no_lemari = $request->no_lemari;
        $data_inventaris->nama_petugas = $request->nama_petugas;
        $data_inventaris->kondisi = $request->kondisi;
        $data_inventaris->tgl_inventaris = $request->tgl_inventaris;        
        $data_inventaris->catatan = $request->catatan;
        $data_inventaris->keterangan = $request->keterangan;
        $data_inventaris->save();
        return redirect('laporan_inventaris');
        
    }

    public function ajaxRequest()
    {
        return view('laporan_inventaris');

    }

    public function ajaxRequestPost(Request $request)
    {
        $data_inventaris = new ModelInventaris();
        $data_inventaris->nama_alat = $request->nama_alat;
        $data_inventaris->no_alat = $request->no_alat;
        $data_inventaris->no_lemari = $request->no_lemari;
        $data_inventaris->nama_petugas = $request->nama_petugas;
        $data_inventaris->kondisi = $request->kondisi;
        $data_inventaris->tgl_inventaris = $request->tgl_inventaris;        
        $data_inventaris->catatan = $request->catatan;
        $data_inventaris->keterangan = $request->keterangan;
        $data_inventaris->save();
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
}
