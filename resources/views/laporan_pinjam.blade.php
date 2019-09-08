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
                                    <h4>Laporan Pinjam & Kembali <b>Sistem Koin</b></h4>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="card-body">      
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Waktu Pinjam</th>
                                        <th>No. Koin</th>
                                        <th>No. Alat</th>
                                        <th>Nama Alat</th>
                                        <th>Waktu Kembali</th>
                                        <th>Kondisi</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Nama Petugas</th>
                                        <th>Kalibrasi</th>
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

       
     
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection