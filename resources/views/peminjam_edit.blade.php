@extends('base')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <div id="content-wrapper">
                @foreach($data_peminjam as $peminjam)
                    <form action="{{ route('peminjam.update', $peminjam->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                       
                        <div class="form-group">
                            <label for="no_induk">No. Induk</label>
                            <input type="text" class="form-control" id="no_induk" value="{{ $peminjam->no_induk }}" name="no_induk" required>
                        </div>
                        <div class="form-group">
                            <label for="no_koin">No. Koin</label>
                            <input type="text" class="form-control" id="no_koin" value="{{ $peminjam->no_koin }}" name="no_koin" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" value="{{ $peminjam->nama }}" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required autofocus >
                                @if ($data_peminjam->count())
                                    <option value="{{ $peminjam->status }}" {{ $selectedStatus == $peminjam->id ? 'selected="selected"' : '' }}>{{ $peminjam->status }}</option>
                                    @if ($peminjam->status == "Pegawai")
                                        <option value="Mahasiswa">Mahasiswa</option>
                                    @elseif ($peminjam->status == "Mahasiswa")
                                        <option value="Pegawai">Pegawai</option>
                                    @else
                                        <option value="Mahasiswa">Mahasiswa</option>
                                        <option value="Pegawai">Pegawai</option>
                                    @endif
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Kelas/Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" value="{{ $peminjam->jurusan }}" name="jurusan" required>
                        </div>
                        <div class="form-group">
                            <label for="ho_hp">No. HP</label>
                            <input type="text" class="form-control" id="no_hp" value="{{ $peminjam->no_hp }}" name="no_hp" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <img class="profile-table form-control" src="{{ url('/data_file/'.$peminjam->foto) }}" id="showfoto" >
                            <input type="file" name="foto" id="foto"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-primary">Perbarui Data</button>
                            <a href="/peminjam" class=" btn btn-md btn-danger">Batalkan</a>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection