<?php

namespace App\Http\Controllers;

use App\ModelPinjamKoin;
use App\ModelPeminjam;
use App\ModelUser;
use App\ModelAlat;
use Illuminate\Http\Request;

class PinjamKoin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pinjam_koin = ModelPinjamKoin::all();
        $admin = ModelUser::all();
        $peralatan = ModelAlat::all();
        $peminjaman = ModelPeminjam::all();
        return view('pinjam_koin', compact('data_pinjam_koin','admin','peralatan','peminjaman'));
    }

    /*public function getDateAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['tgl_pinjam'])
        ->format('d, M Y H:i');
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pinjam_koinCreate(Request $request)
    {
        $data_pinjam_koin = new ModelPinjamKoin();
        $data_peralatan = ModelAlat::find($request->no_alat);
        $data_peminjam = ModelPeminjam::find($request->no_koin);
        
        $data_pinjam_koin->tgl_pinjam = $request->tgl_pinjam;
        $data_pinjam_koin->no_koin = $data_peminjam->no_koin;
        $data_pinjam_koin->alat_id = $request->no_alat;
        $data_pinjam_koin->no_alat = $data_peralatan->no_alat;
        $data_pinjam_koin->nama_alat = $request->nama_alat;
        $data_pinjam_koin->tgl_kembali = $request->tgl_kembali;
        $data_pinjam_koin->kondisi = $request->kondisi;
        $data_pinjam_koin->keterangan = $request->keterangan;
        $data_pinjam_koin->status = $request->status;
        $data_pinjam_koin->nama_petugas = $request->nama_petugas;
        $data_pinjam_koin->total_jam_pinjam = $request->total_jam_pinjam;
        $data_pinjam_koin->total_menit_pinjam = $request->total_menit_pinjam;
        $data_pinjam_koin->save();
        
        $data_peralatan->kondisi_akhir = $request->kondisi;
        $data_peralatan->status = $request->status;
        $data_peralatan->nama_petugas = $request->nama_petugas;
        $data_peralatan->kalibrasi = $request->total_jam_pinjam;
        $data_peralatan->save();
        
        return redirect('pinjam_koin')->with('alert-success', 'Alat Telah Dipinjam.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_pinjam_koin = ModelPinjamKoin::where('id', $id)->get();
        $selectedStatus = ModelPinjamKoin::first()->no_alat;
        $id = $id;

        return view('kembali_koin',compact('data_pinjam_koin', 'selectedStatus', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $no_alat = $request->input('no_alat');
        $data_pinjam_koin = ModelPinjamKoin::find($id);
        $data_peralatan = ModelAlat::find($data_pinjam_koin->alat_id);
        
        $data_pinjam_koin->tgl_pinjam = $request->tgl_pinjam;
        $data_pinjam_koin->no_koin = $request->no_koin;
        $data_pinjam_koin->no_alat = $request->no_alat;
        $data_pinjam_koin->nama_alat = $request->nama_alat;
        $data_pinjam_koin->tgl_kembali = $request->tgl_kembali;
        $data_pinjam_koin->kondisi = $request->kondisi;
        $data_pinjam_koin->keterangan = $request->keterangan;
        $data_pinjam_koin->status = $request->status;
        $data_pinjam_koin->nama_petugas = $request->nama_petugas;
        $data_pinjam_koin->total_jam_pinjam = $request->total_menit_pinjam;
        $data_pinjam_koin->total_menit_pinjam = $request->total_menit_pinjam;
        $data_pinjam_koin->save();

        $data_peralatan->kondisi_akhir = $request->kondisi;
        $data_peralatan->status = $request->status;
        $data_peralatan->nama_petugas = $request->nama_petugas;
        $data_peralatan->kalibrasi = $request->total_menit_pinjam;
        $data_peralatan->save();

        return redirect()->route('pinjam_koin.index')->with('alert-success', 'Alat Telah Dikembalikan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pinjam_koin = ModelPinjamKoin::where('id', $id)->first();
        $data_pinjam_koin->delete();
        return redirect()->route('pinjam_koin.index')->with('alert-success','Data Peminjaman Telah Dihapus!');
    }
    
}
