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
                            <input type="text" class="form-control" id="no_alat" value="{{ $alat->no_alat }}" name="no_alat" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="no_lemari">No. Lemari</label>
                            <input type="text" class="form-control" id="no_lemari" value="{{ $alat->no_lemari }}" name="no_lemari" required>
                        </div>
                        <div class="form-group">
                            <label for="no_seri">No. Seri</label>
                            <input type="text" class="form-control" id="no_seri" value="{{ $alat->no_seri }}" name="no_seri" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_alat">Nama Alat</label>
                            <input type="text" class="form-control" id="nama_alat" value="{{ $alat->nama_alat }}" name="nama_alat" required>
                        </div>
                        <div class="form-group">
                            <label for="tipe_alat">Tipe Alat</label>
                            <input type="text" class="form-control" id="tipe_alat" value="{{ $alat->tipe_alat }}" name="tipe_alat" required>
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" class="form-control" id="merk" value="{{ $alat->merk }}" name="merk" required>
                        </div>
                        <div class="form-group">
                            <label for="kondisi_awal">Kondisi Awal</label>
                            <select class="form-control" id="kondisi_awal" name="kondisi_awal" required>
                            @if ($data_alat->count())
                                <option value="{{ $alat->kondisi_awal }}" {{ $selectedStatus == $alat->no_alat ? 'selected="selected"' : '' }}>{{ $alat->kondisi_awal }}</option>
                                @if ($alat->kondisi_awal =="Bagus")
                                    <option value="Proses">Proses</option>
                                    <option value="Rusak">Rusak</option>
                                @elseif ($alat->kondisi_awal =="Rusak")
                                    <option value="Bagus">Bagus</option>
                                    <option value="Proses">Proses</option>
                                @elseif ($alat->kondisi_awal =="Proses")
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
                            <label for="tgl_inventaris">Tanggal Inventaris</label>
                            <input type="date" class="form-control" id="tgl_inventaris" value="{{ $alat->tgl_inventaris }}" name="tgl_inventaris" required>
                        </div>
                        <div class="form-group">
                            <label for="kondisi_akhir">Kondisi Akhir</label>
                            <select class="form-control" id="kondisi_akhir" name="kondisi_akhir" required>
                            @if ($data_alat->count())
                                <option value="{{ $alat->kondisi_akhir }}" {{ $selectedStatus == $alat->no_alat ? 'selected="selected"' : '' }}>{{ $alat->kondisi_akhir }}</option>
                                @if ($alat->kondisi_akhir =="Bagus")
                                    <option value="Proses">Proses</option>
                                    <option value="Rusak">Rusak</option>
                                @elseif ($alat->kondisi_akhir =="Rusak")
                                    <option value="Bagus">Bagus</option>
                                    <option value="Proses">Proses</option>
                                @elseif ($alat->kondisi_akhir =="Proses")
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
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" class="form-control" id="nama_petugas" value=" {{Session::get('name')}} " name="nama_petugas" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                @if ($data_alat->count())
                                    <option value="{{ $alat->status }}" {{ $selectedStatus == $alat->no_alat ? 'selected="selected"' : '' }}>{{ $alat->status }}</option>
                                    @if ($alat->status == "Sudah Dikembalikan")
                                        <option value="Dipinjam">Dipinjam</option>
                                    @elseif ($alat->status == "Dipinjam")
                                        <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
                                    @else
                                        <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
                                        <option value="Dipinjam">Dipinjam</option>
                                    @endif
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kalibrasi">Kalibrasi</label>
                            <input type="number" class="form-control" id="kalibrasi" value="{{ $alat->kalibrasi }}" name="kalibrasi" required>
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