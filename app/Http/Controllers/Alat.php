<?php

namespace App\Http\Controllers;

use App\ModelUser;
use App\ModelAlat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Alat extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_alat = ModelAlat::all();
        $admin = ModelUser::all();
        return view('alat', compact('data_alat','admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function alatCreate(Request $request)
    {
        /*$messages = [
            'required' => 'Data belum terisi dengan lengkap!',
        ];

        $this->validate($request, [
            'no_alat' => 'required|unique:alat',
            'no_lemari' => 'required',
            'no_seri' => 'required',
            'nama_alat' => 'required',
            'tipe_alat' => 'required',
            'merk' => 'required',
            'kondisi_awal' => 'required',
            'tgl_inventaris' => 'required',
            'kondisi_akhir' => 'required',
            'nama_pengguna' => 'required',
            'status' => 'required',
        ], $messages); */

        $data_alat = new ModelAlat();
        $data_alat->no_alat = $request->no_alat;
        $data_alat->no_lemari = $request->no_lemari;
        $data_alat->no_seri = $request->no_seri;
        $data_alat->nama_alat = $request->nama_alat;
        $data_alat->tipe_alat = $request->tipe_alat;
        $data_alat->merk = $request->merk;
        $data_alat->kondisi_awal = $request->kondisi_awal;
        $data_alat->tgl_inventaris = $request->tgl_inventaris;
        $data_alat->kondisi_akhir = $request->kondisi_akhir;
        $data_alat->nama_petugas = $request->nama_petugas;
        $data_alat->status = $request->status;
        $data_alat->kalibrasi = $request->kalibrasi;
        $data_alat->save();
        return redirect('alat')->with('alert-success', 'Data Alat Berhasil Ditambahkan.');
        
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
    public function edit($no_alat)
    {
        $data_alat = ModelAlat::where('no_alat',$no_alat)->get();
        $selectedStatus = ModelAlat::first()->no_alat;

        return view('alat_edit',compact('data_alat', 'selectedStatus'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $no_alat)
    {
        $data_alat = ModelAlat::where('no_alat',$no_alat)->first();
        $data_alat->no_alat = $request->no_alat;
        $data_alat->no_lemari = $request->no_lemari;
        $data_alat->no_seri = $request->no_seri;
        $data_alat->nama_alat = $request->nama_alat;
        $data_alat->tipe_alat = $request->tipe_alat;
        $data_alat->merk = $request->merk;
        $data_alat->kondisi_awal = $request->kondisi_awal;
        $data_alat->tgl_inventaris = $request->tgl_inventaris;
        $data_alat->kondisi_akhir = $request->kondisi_akhir;
        $data_alat->nama_petugas = $request->nama_petugas;
        $data_alat->status = $request->status;
        $data_alat->kalibrasi = $request->kalibrasi;
        $data_alat->save();
        return redirect()->route('alat.index')->with('alert-success','Data Alat Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($no_alat)
    {
        $data_alat = ModelAlat::where('no_alat',$no_alat)->first();
        $data_alat->delete();
        return redirect()->route('alat.index')->with('alert-success','Data Alat Berhasil Dihapus!');
    }
}
