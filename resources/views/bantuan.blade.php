@extends('base')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
        
                    <div class="row">
                        <div>
                            <img class="profile-image" id="sidebarToggle" href="#" src="/icon/iconpolman.png" alt="">
                        </div>
                        <div class="col-5 text-dark float-left" style="padding-top: 10px">
                            <h4>Butuh <b>Bantuan?</b></h4>
                        </div>
                    </div>  
                    <h6>Selamat Datang, {{Session::get('name')}}!</h6><hr>
                    <h4 style="text-align:center;">Petunjuk Penggunaan Website <b>Tool Crib AE</b> POLMAN Bandung</h4>
                    <h6><b>1. Data Alat</b></h6>
                    <p style="text-indent:30px;">Pada bagian ini admin dapat melakukan penambahan data alat, mengubah rincian data alat maupun menghapus data tersebut.</p>
                   
                    <p style="text-align:center;">Tampilan untuk menambahkan data alat.</p>
                    <img class="img-contoh zoom" src="/icon/tambahalat.png"><br>
                    <p>- <i>No. Alat</i>: nomor alat yang akan ditambahkan.</p>
                    <p>- <i>No. Lemari</i>: nomor lemari penyimpanan alat tersebut.</p>
                    <p>- <i>No. Seri</i>: nomor seri alat tersebut.</p>
                    <p>- <i>Nama Alat</i>: nama alat tersebut.</p>
                    <p>- <i>Tipe Alat</i>: tipe alat tersebut.</p>
                    <p>- <i>Merk</i>: merk alat tersebut.</p>
                    <p>- <i>Kondisi Awal</i>: kondisi awal saat alat tersebut diterima.</p>
                    <p>- <i>Tanggal Inventaris</i>: tanggal saat alat tersebut diinventariskan.</p>
                    <p>- <i>Kondisi Akhir</i>: kondisi akhir alat tersebut.</p>
                    <p>- <i>Nama Petugas</i>: nama admin yang sedang login dan akan bertanggung jawab terhadap proses penambahan data alat tersebut.</p>
                    <p>- <i>Status</i>: status fisik alat tersebut.</p>
                    <p>- <i>Total Jam Pakai</i>: jumlah jam pemakaian alat tersebut.</p>
                    <br>
                    <p style="text-align:center;">Tampilan untuk mengubah rincian data alat.</p>
                    <img class="img-contoh zoom" src="/icon/ubahalat.png"><br>
                    <p>- <i>No. Alat</i>: nomor alat yang akan diubah.</p>
                    <p>- <i>No. Lemari</i>: nomor lemari yang akan diubah.</p>
                    <p>- <i>No. Seri</i>: nomor seri alat yang akan diubah.</p>
                    <p>- <i>Nama Alat</i>: nama alat yang akan diubah.</p>
                    <p>- <i>Tipe Alat</i>: tipe alat yang akan diubah.</p>
                    <p>- <i>Merk</i>: merk alat yang akan diubah.</p>
                    <p>- <i>Kondisi Awal</i>: kondisi awal yang akan diubah.</p>
                    <p>- <i>Tanggal Inventaris</i>: tanggal inventaris yang akan diubah.</p>
                    <p>- <i>Kondisi Akhir</i>: kondisi akhir yang akan diubah.</p>
                    <p>- <i>Nama Petugas</i>: nama admin yang sedang login dan akan bertanggung jawab terhadap proses pengubahan data alat tersebut.</p>
                    <p>- <i>Status</i>: status fisik alat yang akan diubah.</p>
                    <p>- <i>Total Jam Pakai</i>: jumlah jam pemakaian alat yang akan diubah.</p>
                    <br>
                    
                    <h6><b>2. Pinjam & Kembali </b></h6>
                    <p style="text-indent:30px;">  <b> a. Sistem Koin</b><br></p>
                    <p style="text-indent:30px;">Pada bagian ini admin dapat melakukan input data peminjaman alat, pengembalian alat dan menghapus data transaksi peminjaman-pengembalian alat berdasarkan nomor koin.</p>
                   
                    <p style="text-align:center;">Tampilan untuk peminjaman alat.</p>
                    <img class="img-contoh zoom" src="/icon/pinjamalat.png"><br>
                    <p>- <i>Waktu Pinjam</i>: waktu otomatis saat admin akan memasukan data peminjaman.</p>
                    <p>- <i>No. Koin</i>: nomor koin yang telah terdaftar dalam data peminjam.</p>
                    <p>- <i>No. Alat</i>: nomor alat yang telah terdaftar dalam data alat.</p>
                    <p>- <i>Nama Alat</i>: nama alat yang akan muncul berdasarkan nomor alat yang dipilih admin.</p>
                    <p>- <i>Kondisi</i>: kondisi alat yang akan muncul berdasarkan nomor alat yang dipilih admin. Apabila kondisi alat "Rusak" atau "Proses" maka alat tidak dapat dipinjam, sedangkan apabila kondisi alat bagus maka alat dapat dipinjam.</p>
                    <p>- <i>Status</i>: status alat yang akan muncul berdasarkan nomor alat yang dipilih admin. Apabila  status alat "Dipinjam" maka alat tidak dapat dipinjam kembali, sedangkan apabila status alat "Sudah Dikembalikan" maka alat dapat dipinjam.</p>
                    <p>- <i>Keterangan</i>: admin dapat memberikan keterangan disetaip proses peminjama alat.</p>
                    <p>- <i>Nama Petugas</i>: nama admin yang sedang login dan akan bertanggung jawab terhadap proses peminjaman alat tersebut.</p>
                    <br>
                    <p style="text-align:center;">Tampilan untuk pengembalian alat.</p>
                    <img class="img-contoh zoom" src="/icon/kembalialat.png"><br>
                    <p>- <i>Waktu Pinjam</i>: waktu saat admin peminjaman dilakukan.</p>
                    <p>- <i>Waktu Kembali</i>: waktu otomatis saat admin akan memasukan data pengembalian..</p>
                    <p>- <i>No. Koin</i>: nomor koin peminjam alat.</p>
                    <p>- <i>No. Alat</i>: nomor alat yang dipinjam.</p>
                    <p>- <i>Nama Alat</i>: nama alat yang dipinjam.</p>
                    <p>- <i>Kondisi</i>: kondisi alat yang akan muncul berdasarkan kondisi alat saat peminjaman alat tersebut. Admin dapat merubahnya apabila kondisi alat yang dikembalikan tidak sesuai dengan kondisi terakhir alat saat dipinjam.</p>
                    <p>- <i>Status</i>: status alat yang akan muncul berdasarkan status alat saat peminjamn tersebut. Apabila  status alat "Sudah Dikembalikan" maka alat tidak dapat dikembalikan kembali.</p>
                    <p>- <i>Keterangan</i>: keterangan yang diinputkan admin saat peminjaman alat dapat diubah oleh admin.</p>
                    <p>- <i>Nama Petugas</i>: nama admin yang sedang login dan akan bertanggung jawab terhadap proses pengembalian alat tersebut.</p>
                    <br>

                    <p style="text-indent:30px;">  <b> a. Sistem KTM</b><br></p>
                    <p style="text-indent:30px;">Pada bagian ini juga admin dapat melakukan input data peminjaman alat, pengembalian alat dan menghapus data transaksi peminjaman-pengembalian alat berdasarkan nomor induk yang tercantum pada KTM.</p>

                    <p style="text-align:center;">Tampilan untuk peminjaman alat.</p>
                    <img class="img-contoh zoom" src="/icon/alatpinjam.png"><br>
                    <p>- <i>Waktu Pinjam</i>: waktu otomatis saat admin akan memasukan data peminjaman.</p>
                    <p>- <i>No. KTM</i>: nomor induk yang tercantun pada KTM dan telah terdaftar dalam data peminjam.</p>
                    <p>- <i>No. Alat</i>: nomor alat yang telah terdaftar dalam data alat.</p>
                    <p>- <i>Nama Alat</i>: nama alat yang akan muncul berdasarkan nomor alat yang dipilih admin.</p>
                    <p>- <i>Kondisi</i>: kondisi alat yang akan muncul berdasarkan nomor alat yang dipilih admin. Apabila kondisi alat "Rusak" atau "Proses" maka alat tidak dapat dipinjam, sedangkan apabila kondisi alat bagus maka alat dapat dipinjam.</p>
                    <p>- <i>Status</i>: status alat yang akan muncul berdasarkan nomor alat yang dipilih admin. Apabila  status alat "Dipinjam" maka alat tidak dapat dipinjam kembali, sedangkan apabila status alat "Sudah Dikembalikan" maka alat dapat dipinjam.</p>
                    <p>- <i>Keterangan</i>: keterangan yang diberikan admin saat proses peminjaman alat.</p>
                    <p>- <i>Nama Petugas</i>: nama admin yang sedang login dan akan bertanggung jawab terhadap proses peminjaman alat tersebut.</p>
                    <br>
                    <p style="text-align:center;">Tampilan untuk pengembalian alat.</p>
                    <img class="img-contoh zoom" src="/icon/alatkembali.png"><br>
                    <p>- <i>Waktu Pinjam</i>: waktu saat admin peminjaman dilakukan.</p>
                    <p>- <i>Waktu Kembali</i>: waktu otomatis saat admin akan memasukan data pengembalian..</p>
                    <p>- <i>No. KTM</i>: nomor induk peminjam alat.</p>
                    <p>- <i>No. Alat</i>: nomor alat yang dipinjam.</p>
                    <p>- <i>Nama Alat</i>: nama alat yang dpinjam.</p>
                    <p>- <i>Kondisi</i>: kondisi alat yang akan muncul berdasarkan kondisi alat saat peminjaman alat tersebut. Admin dapat merubahnya apabila kondisi alat yang dikembalikan tidak sesuai dengan kondisi terakhir alat saat dipinjam.</p>
                    <p>- <i>Status</i>: status alat yang akan muncul berdasarkan status alat saat peminjamn tersebut. Apabila  status alat "Sudah Dikembalikan" maka alat tidak dapat dikembalikan kembali.</p>
                    <p>- <i>Keterangan</i>: keterangan yang diberikan admin saat peminjaman alat dapat diubah oleh admin.</p>
                    <p>- <i>Nama Petugas</i>: nama admin yang sedang login dan akan bertanggung jawab terhadap proses pengembalian alat tersebut.</p>
                    <br>

                    <h5><b>3. Data Peminjam</b></h5>
                    <p style="text-indent:30px;">Pada bagian ini admin dapat melakukan penambahan data peminjam yang terdiri dari mahasiswa/i dan dosen/staff, mengubah rincian data peminjam maupun menghapus data tersebut.</p>
                   
                    <p style="text-align:center;">Tampilan untuk menambahkan data peminjam.</p>
                    <img class="img-contoh zoom" src="/icon/tambahanggota.png"><br>
                    <p>- <i>No. KTM</i>: nomor induk peminjam yang tercantum pada KTM.</p>
                    <p>- <i>No. Koin</i>: nomor koin peminjam.</p>
                    <p>- <i>Status</i>: status peminjam sebagai mahasiswa/i atau dosen/staff.</p>
                    <p>- <i>Nama Lengkap</i>: nama lengkap peminjam.</p>
                    <p>- <i>Tempat Lahir</i>: tempat lahir peminjam.</p>
                    <p>- <i>Tanggal Lahir</i>: tanggal lahir peminjam.</p>
                    <p>- <i>No. HP</i>: nomor ponsel pribadi peminjam yang dapat dihubungi dan terhubung ke WhatsApp.</p>
                    <p>- <i>E-mail</i>: e-mail peminjam.</p>
                    <p>- <i>Alamat</i>: alamat asal peminjam.</p>
                    <br>
                    <p style="text-align:center;">Tampilan untuk mengubah rincian data peminjam.</p>
                    <img class="img-contoh zoom" src="/icon/ubahanggota.png"><br>
                    <p>- <i>No. KTM</i>: nomor induk peminjam yang akan diubah.</p>
                    <p>- <i>No. Koin</i>: nomor koin peminjam yang akan diubah.</p>
                    <p>- <i>Status</i>: status peminjam yang akan diubah.</p>
                    <p>- <i>Nama Lengkap</i>: nama lengkap peminjam yang akan diubah.</p>
                    <p>- <i>Tempat Lahir</i>: tempat lahir peminjam yang akan diubah.</p>
                    <p>- <i>Tanggal Lahir</i>: tanggal lahir peminjam yang akan diubah.</p>
                    <p>- <i>No. HP</i>: nomor ponsel pribadi peminjam yang akan diubah.</p>
                    <p>- <i>E-mail</i>: e-mail peminjam yang akan diubah.</p>
                    <p>- <i>Alamat</i>: alamat asal peminjam yang akan diubah.</p>
                    <br>

        
        <script type="text/javascript">
            window.onload = function(){
                //alert('oy');

                $(document).ready(function(){
                    $('.zoom').hover(function() {
                        $(this).addClass('transisi');
                    }, function() {
                        $(this).removeClass('transisi');
                    });
                });
            }  
        </script>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection