<?php

namespace App\Http\Controllers;

use App\ModelUser;
use App\ModelPeminjam;
use App\ModelAlat;
use App\ModelPinjamKoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use File;

class Peminjam extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_peminjam = ModelPeminjam::all();
        return view('peminjam', compact('data_peminjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function peminjamCreate(Request $request)
    {
       $this->validate($request, [
            'no_induk' => 'required',
            'no_koin' => 'required',
            'status' => 'required',
            'nama' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required|min:10',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            ]);

        $foto = $request->file('foto');
        $nama_file = time()."_".$foto->getClientOriginalName();

        $tujuan_upload = 'data_file';
        $foto->move($tujuan_upload,$nama_file);

        ModelPeminjam::create([
            'no_induk' => $request->no_induk,
            'no_koin' => $request->no_koin,
            'status' => $request->status,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'no_hp' => $request->no_hp,
            'foto' => $nama_file,
        ]);

        /*    $foto = $request->file('foto');
            $nama_foto = $foto->getClientOriginalExtension();
            Storage::disk('public')->put($foto->getFilename().'.'.$nama_foto, File::get($foto));

        $data_peminjam = new ModelPeminjam();
        $data_peminjam->no_induk = $request->no_induk;
        $data_peminjam->no_koin = $request->no_koin;
        $data_peminjam->status = $request->status;
        $data_peminjam->nama = $request->nama;
        $data_peminjam->jurusan = $request->jurusan;
        $data_peminjam->no_hp = $request->no_hp;
        $data_peminjam->foto = $foto->getFileName().'.'.$nama_foto;
        $data_peminjam->save();*/

        return redirect('peminjam')->with('alert-success', 'Berhasil Menambahkan Data.');
        
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
        $data_peminjam = ModelPeminjam::where('id', $id)->get();
        $selectedStatus = ModelPeminjam::first()->id;

        return view('peminjam_edit',compact('data_peminjam', 'selectedStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_peminjam = ModelPeminjam::where('id',$id)->first();
        $data_peminjam->no_induk = $request->no_induk;
        $data_peminjam->no_koin = $request->no_koin;
        $data_peminjam->status = $request->status;
        $data_peminjam->nama = $request->nama;
        $data_peminjam->jurusan = $request->jurusan;
        $data_peminjam->no_hp = $request->no_hp;
        if($request->file('foto') == "")
        {
            $data_peminjam->foto = $data_peminjam->foto;
        }
        else
        {
            File::delete('data_file/'.$data_peminjam->foto);

            $foto = $request->file('foto');
            $nama_file = time()."_".$foto->getClientOriginalName();
            $request->file('foto')->move("data_file",$nama_file);
            $data_peminjam->foto = $nama_file;
        }
        $data_peminjam->update();

        return redirect()->route('peminjam.index')->with('alert-success','Data Telah Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_peminjam = ModelPeminjam::where('id',$id)->first();
        File::delete('data_file/'.$data_peminjam->foto);
        $data_peminjam->delete();
        return redirect()->route('peminjam.index')->with('alert-success','Data Berhasil Dihapus!');
    }
}
