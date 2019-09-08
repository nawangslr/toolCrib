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
                                <h4>Data Peminjaman <b>Sistem KTM</b></h4>
                            </div>
                            <div class="col-6" style="padding-top: 10px">
                                <button type="button" class="btn btn-primary btn-md float-right" data-toggle="modal" data-target="#exampleModal" id="btn_pinjam_alat">Pinjam Alat</button> 
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
                                        <th>No. KTM</th>
                                        <th>No. Alat</th>
                                        <th>Nama Alat</th>
                                        <th>Waktu Kembali</th>
                                        <th>Kondisi</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Nama Petugas</th>
                                        <th>Kalibrasi</th>                                        
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $id = 1; @endphp
                                    @foreach($data_pinjam_ktm as $pinjam_ktm)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $pinjam_ktm->tgl_pinjam }}</td>
                                            <td>{{ $pinjam_ktm->no_koin }}</td>
                                            <td>{{ $pinjam_ktm->no_alat }}</td>
                                            <td>{{ $pinjam_ktm->nama_alat }}</td>
                                            <td>{{ $pinjam_ktm->tgl_kembali }}</td>
                                            <td>{{ $pinjam_ktm->kondisi }}</td>
                                            <td>{{ $pinjam_ktm->keterangan }}</td>
                                            <td>{{ $pinjam_ktm->status }}</td>
                                            <td>{{ $pinjam_ktm->nama_petugas }}</td>
                                            <td>{{ $pinjam_ktm->total_jam_pinjam }}</td>
                                            <td>
                                                <form action="{{ route('pinjam_ktm.destroy', $pinjam_ktm->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <a href="{{ route('pinjam_ktm.edit', $pinjam_ktm->id) }}" class=" btn btn-sm btn-warning btn-block" id="btn_kembali">Kembalikan</a> <hr>
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
                    <form action="{{ url('/pinjam_ktmCreate') }}" method="post" id="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="tgl_pinjam">Waktu Pinjam</label>
                            <input class="form-control" id="tgl_pinjam"  name="tgl_pinjam" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="no_koin">No. Induk</label>
                            <select class="form-control" id="no_koin" name="no_koin" required autofocus>
                                @foreach($peminjaman as $peminjam)
                                <option id="koin-{{$peminjam->id}}" value="{{$peminjam->id}}">{{ $peminjam->no_induk }}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="no_alat">No. Alat</label>
                            <select class="form-control" id="no_alat" name="no_alat" required>
                                @foreach($peralatan as $alat)
                                <option id="alat-{{$alat->id}}" value="{{$alat->id}}" 
                                        data-nama="{{$alat->nama_alat}}" 
                                        data-status="{{$alat->status}}"  
                                        data-kondisi="{{$alat->kondisi_akhir}}"
                                        data-kalibrasi="{{$alat->kalibrasi}}">{{ $alat->no_alat }}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_alat">Nama Alat</label>
                            <input type="text" id="nama_alat" class="form-control" name="nama_alat" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="kondisi">Kondisi</label>
                            <input type="text" id="kondisi" class="form-control" name="kondisi" required readonly>
                        </div>                    
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" class="form-control" name="status" required>
                                <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
                                <option value="Dipinjam">Dipinjam</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" placeholder="Tulis sesuatu.." name="keterangan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" class="form-control" id="nama_petugas" value=" {{Session::get('name')}} " name="nama_petugas" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="total_jam_pinjam">Kalibrasi</label>
                            <input type="number" class="form-control" id="total_jam_pinjam" name="total_jam_pinjam" readonly required>
                            <input type="hidden" class="form-control" id="total_menit_pinjam" name="total_menit_pinjam" readonly required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btn_pinjam" >Pinjam Alat</button>
                            <button class="btn btn-secondary" id="btn_batal">Batalkan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 

        <script type="text/javascript">
            window.onload = function(){
                //alert('oy');

                //select pinjam ktm
                $("#no_alat").change(function () {
                    var ambilNama = $("#alat-"+this.value).data('nama');
                    var ambilStatus = $("#alat-"+this.value).data('status');
                    var ambilKondisi = $("#alat-"+this.value).data('kondisi');
                    var ambilKalibrasi = $("#alat-"+this.value).data('kalibrasi');
                    $("#nama_alat").val(ambilNama);
                    $("#status").val(ambilStatus);
                    $("#kondisi").val(ambilKondisi);
                    $("#total_jam_pinjam").val(ambilKalibrasi);

                    var i= $("#total_jam_pinjam").val();
                    var result=parseInt(i)+1;
                    $("#total_menit_pinjam").val(result);

                    if(ambilStatus === "Dipinjam") {
                        $("#btn_pinjam").prop("disabled", true);
                        $("#status").prop("disabled", true);
                    } else if(ambilKondisi === "RUSAK") {
                        $("#btn_pinjam").prop("disabled", true);
                        $("#status").prop("disabled", true);
                    } else if(ambilKondisi === "Rusak") {
                        $("#btn_pinjam").prop("disabled", true);
                        $("#status").prop("disabled", true);
                    } else if(ambilKondisi === "Proses") {
                        $("#btn_pinjam").prop("disabled", true);
                        $("#status").prop("disabled", true);
                    } else if(ambilKondisi === "PROSES") {
                        $("#btn_pinjam").prop("disabled", true);
                        $("#status").prop("disabled", true);                        
                    } else if(ambilKalibrasi === 125) {
                        $("#btn_pinjam").prop("disabled", true);
                        $("#status").prop("disabled", true);
                        alert('Alat Harus Dikalibrasi!!')
                    } else {
                        $("#status").prop("disabled", false);
                        $("#btn_pinjam").prop("disabled", false);
                    }
                });

                $("#btn_batal").click(function () {
                    $("#status").prop("disabled", false);
                    $("#btn_pinjam").prop("disabled", false);
                    $("#form")[0].reset();
                    jDate();
                });

                $("#btn_pinjam_alat").click(function () {              
                    jDate();
                });
            }

            function jDate() {
                var hari = ['Ahad', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var tanggal = new Date().getDate();
                    var _hari = new Date().getDay();
                    var _bulan = new Date().getMonth();
                    var _tahun = new Date().getYear();
                    var jam = new Date().getHours();
                    var menit = new Date().getMinutes();
                    var detik = new Date().getSeconds();
                    var hari = hari[_hari];
                    var bulan = bulan[_bulan];
                    var tahun = (_tahun < 1000) ? _tahun + 1900 : _tahun;

                    $("#tgl_pinjam").val(hari +', '+ tanggal +' '+ bulan +' '+ tahun +' '+ jam +':'+ menit +":"+ detik);
            }
        </script>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection