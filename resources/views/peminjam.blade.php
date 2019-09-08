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
                    <div class="card mb-3">
                      <div class="card-header">
                        <div class="row">
                            <div>
                                <img class="profile-image" id="sidebarToggle" href="#" src="/icon/iconpolman.png" alt="">
                            </div>
                            <div class="col-5 text-dark float-left" style="padding-top: 10px">
                                <h4>Data <b>Peminjam</b></h4>
                            </div>
                            <div class="col-6" style="padding-top: 10px">
                                <button type="button" class="btn btn-primary btn-md float-right" data-toggle="modal" data-target="#exampleModal">Tambah Anggota</button> 
                            </div>
                        </div>  
                      </div>
                      <div class="card-body">      
                        <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Induk</th>
                                        <th>No. Koin</th>
                                        <th>Nama</th>
                                        <th>Kelas/Jurusan</th>
                                        <th>Status</th>
                                        <th>No. HP</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $id = 1; @endphp
                                    @foreach($data_peminjam as $peminjam)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $peminjam->no_induk }}</td>
                                            <td>{{ $peminjam->no_koin }}</td>
                                            <td>{{ $peminjam->nama }}</td>
                                            <td>{{ $peminjam->jurusan }}</td>
                                            <td>{{ $peminjam->status }}</td>
                                            <td>{{ $peminjam->no_hp }}</td>
                                            <td><img class="profile-table" src="{{ url('/data_file/'.$peminjam->foto) }}" alt="Foto Belum Tersedia."></td>
                                            <td>
                                                <form action="{{ route('peminjam.destroy', $peminjam->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <a href="{{ route('peminjam.edit', $peminjam->id) }}" class=" btn btn-sm btn-warning btn-block">Ubah</a> <hr>
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
                       <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ url('/peminjamCreate') }}" method="post" id="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="no_induk">No. Induk</label>
                            <input class="form-control" id="no_induk"  name="no_induk" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="no_koin">No. Koin</label>
                            <input class="form-control" id="no_koin" name="no_koin" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" class="form-control" name="status" required>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Pegawai">Pegawai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Kelas/Jurusan</label>
                            <input class="form-control" id="jurusan" name="jurusan" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. HP</label>
                            <input class="form-control" id="no_hp" name="no_hp" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" required/>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >Tambah</button>
                            <button type="reset" class="btn btn-secondary">Batalkan</button>
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