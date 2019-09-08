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
                                    <h4>Laporan <b>Inventaris</b> Alat</h4>
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
                                        <th>Nama Alat</th>
                                        <th>No. Alat</th>
                                        <th>No. Lemari</th>
                                        <th>Nama Petugas</th>
                                        <th>Kondisi</th>
                                        <th>Tanggal Inventaris</th>
                                        <th>Catatan</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $id = 1; @endphp
                                    @foreach($data_alat as $alat)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>
                                                <label for="nama_alat">{{ $alat->nama_alat }}</label>
                                                <input type="hidden" class="form-control" id="nama_alat" name="nama_alat" value="{{ $alat->nama_alat}}" readonly required>
                                            </td>
                                            <td>
                                                <label for="no-alat">{{ $alat->no_alat }}</label>
                                                <input type="hidden" class="form-control" id="no_alat" name="no_alat" value="{{ $alat->no_alat}}" readonly required>
                                            </td>
                                            <td>
                                                <label for="no_lemari">{{ $alat->no_lemari }}</label>
                                                <input type="hidden" class="form-control" id="no_lemari" name="no_lemari" value="{{ $alat->no_lemari }}" readonly required>
                                            </td>
                                            <td>
                                                <label for="nama_petugas">{{Session::get('name')}}</label>
                                                <input type="hidden" class="form-control" id="nama_petugas" name="nama_petugas" value="{{ Session::get('name') }}" readonly required>
                                            </td>
                                            <td>
                                                <label for="kondisi">{{ $alat->kondisi_akhir }}</label>
                                                <input type="hidden" class="form-control" id="kondisi" name="kondisi" value="{{ $alat->kondisi_akhir}}" readonly required>
                                            </td>
                                            <td>
                                                <label for="tgl_inventaris">{{ Date("d/m/Y")}}</label>
                                                <input class="form-control" id="tgl_inventaris" name="tgl_inventaris" type="hidden" value="{{ Date("d/m/Y") }}">
                                            </td>
                                            <td>
                                                <textarea class="form-control" id="catatan" name="keterangan" width="50px">@foreach($data_inventaris as $inventaris){{ $inventaris->catatan}}@endforeach</textarea>
                                            </td>
                                            <td>
                                                    <input type="hidden" class="form-control" id="keterangan" name="keterangan" readonly required>  
                                                    <button type="submit" class="form-control btn btn-md btn-primary" id="btn_ada" >Ada</button><hr>
                                                    <button type="submit" class="form-control btn btn-md btn-secondary" id="btn_tidakada">Tidak Ada</button>
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

        <script type="text/javascript">
            window.onload = function(){
              //  alert('oy');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                if($("#btn_ada").click) {
                    $("#keterangan").val("Ada");
                    $("#btn_ada").click(function(e){
                        e.preventDefault();
                        var nama_alat = $("input[name=nama_alat]").val();
                        var no_alat = $("input[name=no_alat]").val();
                        var no_lemari = $("input[name=no_lemari]").val();
                        var nama_petugas = $("input[name=nama_petugas]").val();
                        var kondisi = $("input[name=kondisi]").val();
                        var tgl_inventaris = $("input[name=tgl_inventaris]").val();
                        var catatan = $("textarea[name=catatan]").val();
                        var keterangan = $("input[name=keterangan]").val();

                        $.ajax({
                        type:'POST',
                        url:'/ajaxRequest',
                        data:{nama_alat:nama_alat, no_alat:no_alat, no_lemari:no_lemari, nama_petugas:nama_petugas, kondisi:kondisi, tgl_inventaris:tgl_inventaris, catatan:catatan, keterangan:keterangan},
                        success:function(data){
                            alert(data.success);
                            }
                        });
                    });
                } else if($("#btn_tidakada").click) {
                    $("#keterangan").val("Ada");
                    $("#btn_tidakada").click(function(e){
                        e.preventDefault();
                        var nama_alat = $("input[name=nama_alat]").val();
                        var no_alat = $("input[name=no_alat]").val();
                        var no_lemari = $("input[name=no_lemari]").val();
                        var nama_petugas = $("input[name=nama_petugas]").val();
                        var kondisi = $("input[name=kondisi]").val();
                        var tgl_inventaris = $("input[name=tgl_inventaris]").val();
                        var catatan = $("input[name=catatan]").val();
                        var keterangan = $("input[name=keterangan]").val();

                        $.ajax({
                        type:'POST',
                        url:'/ajaxRequest',
                        data:{nama_alat:nama_alat, no_alat:no_alat, no_lemari:no_lemari, nama_petugas:nama_petugas, kondisi:kondisi, tgl_inventaris:tgl_inventaris, catatan:catatan, keterangan:keterangan},
                        success:function(data){
                            alert(data.success);
                            }
                        });
                    });
                }
            }
        </script>


        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection