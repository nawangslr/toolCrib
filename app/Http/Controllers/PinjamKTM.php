<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelPinjamKTM;
use App\ModelAlat;
use App\ModelPeminjam;
use App\ModelUser;

class PinjamKTM extends Controller
{
    public function index()
    {
        $data_pinjam_ktm = ModelPinjamKTM::all();
        $admin = ModelUser::all();
        $peralatan = ModelAlat::all();
        $peminjaman = ModelPeminjam::all();
        return view('pinjam_ktm', compact('data_pinjam_ktm','admin','peralatan','peminjaman'));
    }

    public function pinjam_ktmCreate(Request $request)
    {
        $data_pinjam_ktm = new ModelPinjamKTM();
        $data_peralatan = ModelAlat::find($request->no_alat);
        $data_peminjam = ModelPeminjam::find($request->no_koin);
        
        $data_pinjam_ktm->tgl_pinjam = $request->tgl_pinjam;
        $data_pinjam_ktm->no_koin = $data_peminjam->no_induk;
        $data_pinjam_ktm->alat_id = $request->no_alat;
        $data_pinjam_ktm->no_alat = $data_peralatan->no_alat;
        $data_pinjam_ktm->nama_alat = $request->nama_alat;
        $data_pinjam_ktm->tgl_kembali = $request->tgl_kembali;
        $data_pinjam_ktm->kondisi = $request->kondisi;
        $data_pinjam_ktm->keterangan = $request->keterangan;
        $data_pinjam_ktm->status = $request->status;
        $data_pinjam_ktm->nama_petugas = $request->nama_petugas;
        $data_pinjam_ktm->total_jam_pinjam = $request->total_jam_pinjam;
        $data_pinjam_ktm->total_menit_pinjam = $request->total_menit_pinjam;
        $data_pinjam_ktm->save();
        
        $data_peralatan->kondisi_akhir = $request->kondisi;
        $data_peralatan->status = $request->status;
        $data_peralatan->nama_petugas = $request->nama_petugas;
        $data_peralatan->kalibrasi = $request->total_jam_pinjam;
        $data_peralatan->save();
        
        return redirect('pinjam_ktm')->with('alert-success', 'Alat Telah Dipinjam.');   
    }

    public function edit($id)
    {
        $data_pinjam_ktm = ModelPinjamKTM::where('id', $id)->get();
        $selectedStatus = ModelPinjamKTM::first()->no_alat;
        $id = $id;

        return view('kembali_ktm',compact('data_pinjam_ktm', 'selectedStatus', 'id'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $no_alat = $request->input('no_alat');
        $data_pinjam_ktm = ModelPinjamKTM::find($id);
        $data_peralatan = ModelAlat::find($data_pinjam_ktm->alat_id);
        
        $data_pinjam_ktm->tgl_pinjam = $request->tgl_pinjam;
        $data_pinjam_ktm->no_koin = $request->no_koin;
        $data_pinjam_ktm->no_alat = $request->no_alat;
        $data_pinjam_ktm->nama_alat = $request->nama_alat;
        $data_pinjam_ktm->tgl_kembali = $request->tgl_kembali;
        $data_pinjam_ktm->kondisi = $request->kondisi;
        $data_pinjam_ktm->keterangan = $request->keterangan;
        $data_pinjam_ktm->status = $request->status;
        $data_pinjam_ktm->nama_petugas = $request->nama_petugas;
        $data_pinjam_ktm->total_jam_pinjam = $request->total_menit_pinjam;
        $data_pinjam_ktm->total_menit_pinjam = $request->total_menit_pinjam;
        $data_pinjam_ktm->save();

        $data_peralatan->kondisi_akhir = $request->kondisi;
        $data_peralatan->status = $request->status;
        $data_peralatan->nama_petugas = $request->nama_petugas;
        $data_peralatan->kalibrasi = $request->total_menit_pinjam;
        $data_peralatan->save();

        return redirect()->route('pinjam_ktm.index')->with('alert-success', 'Alat Telah Dikembalikan.');
    }

    public function destroy($id)
    {
        $data_pinjam_ktm = ModelPinjamKTM::where('id', $id)->first();
        $data_pinjam_ktm->delete();
        return redirect()->route('pinjam_ktm.index')->with('alert-success','Data Peminjaman Telah Dihapus!');
    }
}
