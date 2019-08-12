@extends('base')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <div id="content-wrapper">
                @foreach($data_pinjam_koin as $pinjam_koin)
                    <form action="{{ route('pinjam_koin.update', $pinjam_koin->no_koin) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                       
                        <div class="form-group">
                            <label for="no_koin">No. Koin</label>
                            <input type="text" class="form-control" id="no_koin" value="{{ $pinjam_koin -> no_koin }} name="no_koin" onmouseover="this.focus()" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="no_alat">No. Alat</label>
                            <input type="text" class="form-control" id="no_alat" value="{{ $pinjam_koin -> no_alat }}" name="no_alat" onmouseover="this.focus()" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nama_alat">Nama Alat</label>
                            <input type="text" class="form-control" id="nama_alat" value="{{ $pinjam_koin -> nama_alat }}" name="nama_alat" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="kondisi">Kondisi Awal</label>
                            <select class="form-control" id="kondisi" value="{{ $pinjam_koin -> kondisi }}" name="kondisi" required autofocus>
                            <option>Bagus</option>
                            <option>Proses</option>
                            <option>Rusak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" value="{{ $pinjam_koin -> keterangan }}" name="keterangan" required autofocus></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" value="Sudah Dikembalikan" name="status" readonly required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" class="form-control" id="nama_petugas" value=" {{ $pinjam_koin -> nama_petugas}} " name="nama_petugas" readonly required autofocus>
                        </div>
                        
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-primary">Kembalikan Alat</button>
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