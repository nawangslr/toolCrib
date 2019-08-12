@extends('base')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <div id="content-wrapper">
                <div class="container-fluid">                
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success">
                            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                        </div>
                    @endif

                <!--    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif -->
            
                    <div class="card mb-3">
                      <div class="card-header">
                        <div class="row">
                            <div>
                                <img class="profile-image" id="sidebarToggle" href="#" src="/icon/iconpolman.png" alt="">
                            </div>
                            <div class="col-5 text-dark float-left" style="padding-top: 10px">
                                <h4>Data Peminjaman <b>Sistem Koin</b></h4>
                            </div>
                            <div class="col-6" style="padding-top: 10px">
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">Pinjam Alat</button> 
                            </div>
                        </div>  
                      </div>
                      <div class="card-body">      
                        <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Waktu Pinjam</th>
                                        <th>No. Koin</th>
                                        <th>No. Alat</th>
                                        <th>Nama Alat</th>
                                        <th>Waktu Kembali</th>
                                        <th>Kondisi</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Nama Petugas</th>
                                        <th>Total Jam Pinjam</th>
                                        <th>Total Menit Pinjam</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $id = 1; @endphp
                                    @foreach($data_pinjam_koin as $pinjam_koin)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $pinjam_koin->tgl_pinjam }}</td>
                                            <td>{{ $pinjam_koin->no_koin }}</td>
                                            <td>{{ $pinjam_koin->no_alat }}</td>
                                            <td>{{ $pinjam_koin->nama_alat }}</td>
                                            <td>{{ $pinjam_koin->tgl_kembali }}</td>
                                            <td>{{ $pinjam_koin->kondisi }}</td>
                                            <td>{{ $pinjam_koin->keterangan }}</td>
                                            <td>{{ $pinjam_koin->status }}</td>
                                            <td>{{ $pinjam_koin->nama_petugas }}</td>
                                            <td>{{ $pinjam_koin->total_jam_pinjam }}</td>
                                            <td>{{ $pinjam_koin->total_menit_pinjam }}</td>
                                            <td>
                                                <form action="{{ route('pinjam_koin.destroy', $pinjam_koin->no_alat) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <a href="{{ route('pinjam_koin.edit', $pinjam_koin->no_alat) }}" class=" btn btn-sm btn-warning btn-block">Kembalikan</a> <hr>
                                                    <button class="btn btn-sm btn-danger btn-block" type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        
         <!-- Modal Kembalikan Alat-->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Pinjam Alat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ url('/pinjam_koinCreate') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="tgl_pinjam">Waktu Pinjam</label>
                            <input class="form-control" id="tgl_pinjam"  name="tgl_pinjam" value="{{ $pinjam_koin->from_date }}" required autofocus readonly>
                        </div>
                        <div class="form-group">
                            <label for="no_koin">No. Koin</label>
                            <input class="form-control" id="no_koin" placeholder="Contoh: M01-001" name="no_koin" onmouseover="this.focus()" required autofocus>
                        </div>
                        <div class="form-group">
                            <form>
                                <div class="row">
                                    <div class="col-md-10 float-left">
                                        <label for="no_alat">No. Alat</label>
                                        <!-- <input type="text" class="form-control" id="no_alat" placeholder="Contoh: CT-001" name="no_alat" onmouseover="this.focus()" required autofocus>-->
                                        <select class="form-control" id="no_alat" name="no_alat" required autofocus>
                                            @foreach($peralatan as $alat)
                                                <option id="{{$alat->no_alat}}"
                                                        data-nama="{{$alat->nama_alat}}" 
                                                        data-status="{{$alat->status}}"  
                                                        data-kondisi="{{$alat->kondisi_akhir}}">{{ $alat->no_alat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 float-right" style="padding-top: 35px">
                                        <button id="cek" type="button" class="btn btn-sm btn-warning">Cek</button>
                                    </div>
                                </div>
                                
                                <div class="row my-3">
                                    <div class="col-md-3 float-left ml-1">
                                        <label for="nama_alat">Nama Alat</label>
                                    </div>
                                    <div class="col-md-12 float-right">
                                        <input type="text" id="nama_alat" class="form-control" name="nama_alat" required autofocus>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-md-3 float-left ml-1">
                                        <label for="kondisi">Kondisi</label>
                                    </div>
                                    <div class="col-md-12 float-right">
                                        <input type="text" id="kondisi" class="form-control" name="kondisi" required autofocus>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-md-3 float-left ml-1">
                                        <label for="status">Status</label>
                                    </div>
                                    <div class="col-md-12 float-right">
                                        <input type="text" class="form-control" id="status" name="status" required autofocus>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" placeholder="Berikan keterangan.." name="keterangan" required autofocus></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" class="form-control" id="nama_petugas" value=" {{Session::get('name')}} " name="nama_petugas" readonly required autofocus>
                        </div>
                        
                        <!-- <div class="form-group">
                        <label for="nama_petugas">Petugas</label>
                            <select id="nama_petugas" class="form-control">
                                @foreach ($admin as $admins)
                                <option value="{{ $admins->id }}"> {{ $admins->name }}</option>
                                @endforeach
                            </select>
                        </div>-->

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Pinjam Alat</button>
                            <button type="reset" class="btn btn-secondary">Batalkan</button>
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button> -->
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 

       
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection