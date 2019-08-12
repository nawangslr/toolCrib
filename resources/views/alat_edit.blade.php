@extends('base')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <div id="content-wrapper">
                @foreach($data_alat as $alat)
                    <form action="{{ route('alat.update', $alat->no_alat) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                       
                        <div class="form-group">
                            <label for="no_alat">No. Alat</label>
                            <input type="text" class="form-control" id="no_alat" value="{{ $alat -> no_alat }}" name="no_alat" onmouseover="this.focus()" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="no_lemari">No. Lemari</label>
                            <input type="text" class="form-control" id="no_lemari" value="{{ $alat -> no_lemari }}" name="no_lemari" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="no_seri">No. Seri</label>
                            <input type="text" class="form-control" id="no_seri" value="{{ $alat -> no_seri }}" name="no_seri" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nama_alat">Nama Alat</label>
                            <input type="text" class="form-control" id="nama_alat" value="{{ $alat -> nama_alat }}" name="nama_alat" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="tipe_alat">Tipe Alat</label>
                            <input type="text" class="form-control" id="tipe_alat" value="{{ $alat -> tipe_alat }}" name="tipe_alat" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" class="form-control" id="merk" value="{{ $alat -> merk }}" name="merk" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="kondisi_awal">Kondisi Awal</label>
                            <select class="form-control" id="kondisi_awal" value="{{ $alat -> kondisi_awal }}" name="kondisi_awal" required autofocus>
                            <option>Bagus</option>
                            <option>Proses</option>
                            <option>Rusak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_inventaris">Tanggal Inventaris</label>
                            <input type="date" class="form-control" id="tgl_inventaris" value="{{ $alat -> tgl_inventaris }}" name="tgl_inventaris" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="kondisi_akhir">Kondisi Akhir</label>
                            <select class="form-control" id="kondisi_akhir" value="{{ $alat -> kondisi_akhir }}" name="kondisi_akhir" required autofocus>
                            <option>Bagus</option>
                            <option>Proses</option>
                            <option>Rusak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" class="form-control" id="nama_petugas" value=" {{ $alat -> nama_petugas}} " name="nama_petugas" readonly required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required autofocus >
                                @if ($data_alat->count())
                                    <option value="{{ $alat->id }}" {{ $selectedStatus == $alat->no_alat ? 'selected="selected"' : '' }}>{{ $alat->status }}</option>
                                    @if ($alat -> status == "Sudah Dikembalikan")
                                        <option>Dipinjam</option>
                                    @else
                                        <option>Sudah Dikembalikan</option>
                                    @endif
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jam_pakai">Total Jam Pakai</label>
                            <input type="text" class="form-control" id="jam_pakai" value="{{ $alat -> jam_pakai }}" name="jam_pakai" required autofocus>
                            <!-- <form>
                                <div class="row">
                                    <div class="col-10 float-left">
                                        <label for="jam_pakai">Total Jam Pakai</label>
                                        <input type="text" class="form-control" id="jam_pakai" value="{{ $alat -> jam_pakai }}" name="jam_pakai" required autofocus>
                                    </div>
                                    <div class="col-2 float-right" style="padding-top: 35px">
                                        <button id="kalibrasi" type="button" class="btn btn-sm btn-warning">Atur Ulang</button>
                                    </div>
                                </div>
                            </form> -->
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-primary">Perbarui Data</button>
                            <a href="/alat" class=" btn btn-md btn-danger">Batalkan</a>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection