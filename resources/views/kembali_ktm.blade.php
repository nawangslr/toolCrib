@extends('base')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <div id="content-wrapper">
                @foreach($data_pinjam_ktm as $pinjam_ktm)
                    <form action="{{ route('pinjam_ktm.update', $pinjam_ktm->no_alat) }}" id="form_edit" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                       
                        <div class="form-group">
                            <label for="tgl_pinjam">Waktu Pinjam</label>
                            <input class="form-control" id="tgl_pinjam"  name="tgl_pinjam" value="{{ $pinjam_ktm->tgl_pinjam }}" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="tgl_kembali">Waktu Kembali</label>
                            <input class="form-control" id="tgl_kembali"  name="tgl_kembali" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="no_koin">No. KTM</label>
                            <input type="text" class="form-control" id="no_koin" value="{{ $pinjam_ktm->no_koin }}" name="no_koin" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="no_alat">No. Alat</label>
                            <input type="text" class="form-control" id="no_alat" value="{{ $pinjam_ktm->no_alat }}" name="no_alat" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_alat">Nama Alat</label>
                            <input type="text" class="form-control" id="nama_alat" value="{{ $pinjam_ktm->nama_alat }}" name="nama_alat" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="kondisi">Kondisi</label>
                            <select class="form-control" id="kondisi" name="kondisi" required autofocus >
                            @if ($data_pinjam_ktm->count())
                                <option value="{{ $pinjam_ktm->kondisi }}" {{ $selectedStatus == $pinjam_ktm->no_alat ? 'selected="selected"' : '' }}>{{ $pinjam_ktm->kondisi}}</option>
                                @if ($pinjam_ktm->kondisi =="Bagus")
                                    <option value="Proses">Proses</option>
                                    <option value="Rusak">Rusak</option>
                                @elseif ($pinjam_ktm->kondisi =="Rusak")
                                    <option value="Bagus">Bagus</option>
                                    <option value="Proses">Proses</option>
                                @elseif ($pinjam_ktm->kondisi =="Proses")
                                    <option value="Bagus">Bagus</option>
                                    <option value="Rusak">Rusak</option>
                                @else
                                    <option value="Bagus">Bagus</option>
                                    <option value="Rusak">Rusak</option>
                                    <option value="Proses">Proses</option>
                                @endif
                            @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" required>{{ $pinjam_ktm->keterangan }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                @if ($data_pinjam_ktm->count())
                                    <option value="{{ $pinjam_ktm->status }}" {{ $selectedStatus == $pinjam_ktm->no_alat ? 'selected="selected"' : '' }}>{{ $pinjam_ktm->status }}</option>
                                    @if ($pinjam_ktm->status == "Sudah Dikembalikan")
                                        <option value="Dipinjam">Dipinjam</option>
                                    @elseif ($pinjam_ktm->status == "Dipinjam")
                                        <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
                                    @else
                                        <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
                                        <option value="Dipinjam">Dipinjam</option>
                                    @endif
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" class="form-control" id="nama_petugas" value=" {{Session::get('name')}} " name="nama_petugas" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="total_menit_pinjam">Kalibrasi</label>
                            <input type="hidden" class="form-control" id="total_jam_pinjam" name="total_jam_pinjam" readonly required>
                            <input type="number" class="form-control" id="total_menit_pinjam" name="total_menit_pinjam" value="{{ $pinjam_ktm->total_menit_pinjam }}" readonly required>
                        </div>
                        
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-primary" id="btn_kembalikan">Kembalikan</button>
                            <a href="/pinjam_ktm" class=" btn btn-md btn-danger">Batalkan</a>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>

        <script type="text/javascript">
            window.onload = function(){
               // alert('oy');
                jDate();

                var cekStatus = $("#status").val();
                if(cekStatus === "Sudah Dikembalikan") {
                    $("#btn_kembalikan").prop("disabled", true);
                    $("#status").prop("disabled", true);
                }else {
                    $("#btn_kembalikan").prop("disabled", false);
                    $("#status").prop("disabled", false);
                }

                $("#form_edit").submit(function(){
                    var id = {{ $id }};
                    $(this).append("<input type='hidden' name='id' value='"+ id +"'/>");
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

                    $("#tgl_kembali").val(hari +', '+ tanggal +' '+ bulan +' '+ tahun +' '+ jam +':'+ menit +":"+ detik);
            }
        </script>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection