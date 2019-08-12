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
                                <h4>Data <b>Alat</b></h4>
                            </div>
                            <div class="col-6" style="padding-top: 10px">
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">Tambah Data</button> 
                            </div>
                        </div>  
                      </div>
                      <div class="card-body">      
                        <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>No. Alat</th>
                                        <th>No. Lemari</th>
                                        <th>No. Seri</th>
                                        <th>Nama Alat</th>
                                        <th>Tipe Alat</th>
                                        <th>Merk</th>
                                        <th>Kondisi Awal</th>
                                        <th>Tanggal Inventaris</th>
                                        <th>Kondisi Akhir</th>
                                        <th>Nama Petugas</th>
                                        <th>Status</th>
                                        <th>Total Jam Pakai</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $id = 1; @endphp
                                    @foreach($data_alat as $alat)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $alat->no_alat }}</td>
                                            <td>{{ $alat->no_lemari }}</td>
                                            <td>{{ $alat->no_seri }}</td>
                                            <td>{{ $alat->nama_alat }}</td>
                                            <td>{{ $alat->tipe_alat }}</td>
                                            <td>{{ $alat->merk }}</td>
                                            <td>{{ $alat->kondisi_awal }}</td>
                                            <td>{{ $alat->tgl_inventaris }}</td>
                                            <td>{{ $alat->kondisi_akhir }}</td>
                                            <td>{{ $alat->nama_petugas }}</td>
                                            <td>{{ $alat->status }}</td>
                                            <td>{{ $alat->jam_pakai }}</td>
                                            <td>
                                                <form action="{{ route('alat.destroy', $alat->no_alat) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <a href="{{ route('alat.edit',$alat->no_alat) }}" class=" btn btn-sm btn-warning btn-block">Edit</a> <hr>
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

         <!-- Modal Tambah Data-->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Alat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ url('/alatCreate') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="no_alat">No. Alat</label>
                            <input type="text" class="form-control" id="no_alat" placeholder="Contoh: CT-001" name="no_alat" onmouseover="this.focus()" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="no_lemari">No. Lemari</label>
                            <input type="text" class="form-control" id="no_lemari" placeholder="Contoh: 71" name="no_lemari" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="no_seri">No. Seri</label>
                            <input type="text" class="form-control" id="no_seri" placeholder="Contoh: EI853256" name="no_seri" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nama_alat">Nama Alat</label>
                            <input type="text" class="form-control" id="nama_alat" placeholder="Contoh: Curve Tracer" name="nama_alat" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="tipe_alat">Tipe Alat</label>
                            <input type="text" class="form-control" id="tipe_alat" placeholder="Contoh: LTC-905" name="tipe_alat" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" class="form-control" id="merk" placeholder="Contoh: Leader" name="merk" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="kondisi_awal">Kondisi Awal</label>
                            <select class="form-control" id="kondisi_awal" name="kondisi_awal" required autofocus>
                            <option>Bagus</option>
                            <option>Proses</option>
                            <option>Rusak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_inventaris">Tanggal Inventaris</label>
                            <input type="date" class="form-control" id="tgl_inventaris" name="tgl_inventaris" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="kondisi_akhir">Kondisi Akhir</label>
                            <select class="form-control" id="kondisi_akhir" name="kondisi_akhir" required autofocus>
                            <option>Bagus</option>
                            <option>Proses</option>
                            <option>Rusak</option>
                            </select>
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

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required autofocus>
                            <option>Sudah Dikembalikan</option>
                            <option>Dipinjam</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="merk">Total Jam Pakai</label>
                            <input type="text" class="form-control" id="jam_pakai" placeholder="0" name="jam_pakai" required autofocus>                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
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