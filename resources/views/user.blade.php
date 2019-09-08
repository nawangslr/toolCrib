@extends('base')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <style>
            .account-wall {
                margin-top: 20px;
                padding: 40px 0px 20px 0px;
                background-color: #f7f7f7;
                -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                align: center;
            }
            .form-signin {
                max-width: 1000px;
                padding: 15px;
                margin: 0 auto;
            }
            .form-signin .form-signin-heading, .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin .checkbox {
                font-weight: normal;
            }
            .form-signin .form-control {
                position: relative;
                font-size: 16px;
                height: auto;
                padding: 10px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            .form-signin .form-control:focus {
                z-index: 2;
            }
            </style>

            <div class="row">
                <div>
                    <img class="profile-image" id="sidebarToggle" href="#" src="/icon/iconpolman.png" alt="">
                </div>
                <div class="col-5 text-dark float-left" style="padding-top: 10px">
                    <h4><b>Profil</b> Anda</h4>
                </div>
            </div>  
            <h6>Selamat Datang, {{Session::get('name')}}!</h6><hr>
            <h4 style="text-align:center;">Data Diri <b>Admin</b></h4>

            <div class="col-md-6 col-sm-12 col-md-offset-4" style="margin: 0 auto;">
                <div class="account-wall">
                    <form class="form-signin">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <img class="polman-icon" src="/icon/iconpolman.png">
                            <h5 style="text-align:center; margin-top:30px;">Email Anda: <b> {{Session::get('email')}}</b></h5>
                            <h5 style="text-align:center;">Status Login Anda: <b>{{Session::get('login')}} (Aktif) </b></h5>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 
                Kalo mau manggil kebalikannya (misal dair alat ke kategori alatnya, tinggal nama_objek_dari_model_alat->kategori  , dmna kategori adalah method tambahan, lihat di model nya)
             -->

            <h6 class="text-mute mt-3">Daftar Alat tersedia</h6>
                @foreach($alats as $item)
                <div class="col-md-6 card mt-3">
                    {{$item->jenis_alat}} - {{ $item->alat->where('status', '!=', 'Dipinjam')->where('status', '!=', 'Dipinjam untuk PA')->count() }}
                </div>
                @endforeach
            <br>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection