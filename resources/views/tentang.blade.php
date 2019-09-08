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
                            <h4><b>Tentang</b> Website</h4>
                        </div>
                    </div>  
                    <h6>Selamat Datang, {{Session::get('name')}}!</h6><hr>
                    <h4 style="text-align:center;">Website <b>Tool Crib AE</b> POLMAN Bandung</h4>
                    <img class="polman-icon" src="/icon/iconpolman.png"><br>
                    <h5 style="text-align:center;">Tool Crib <b>AE</b> <script>document.write(new Date().getFullYear())</script></h5>
                    <h6 style="text-align:center;"><i>Website Version 1.0.0</i></h6>
                    <h6 style="text-align:center;">Kunjungi Website Kami: <a href="http://www.polman-bandung.ac.id"><i>POLMAN Bandung</i></a> | <a href="http://ae.polman-bandung.ac.id/"><i>AE POLMAN</i></a></h6>
                    

        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection