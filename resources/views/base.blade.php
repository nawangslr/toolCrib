<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
 

    <!-- Canonical -->
    <link rel="canonical" href="">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

    <!-- Page level plugin CSS-->
    <link href="/dashboard_assets/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/dashboard_assets/sb-admin.css" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <style>
      .profile-image {
        width: 45px;
        height: 45px;
        margin-left: 1.5rem;
        display: block;
        -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
          box-sizing: border-box;
      }
      .profile-table {
        width: 150px;
        height: 150px;
        object-fit: scale-down;
      }
      .polman-icon {
        width: 100px;
        height: 100px;
        margin: 0 auto;
        display: block;
        -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
          box-sizing: border-box;
      }
      .profile-icon {
        width: 40px;
        height: 40px;
        display: block;
        -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
          box-sizing: border-box;
        align: right;
      }
      .img-contoh {
        border: 10px;
        solid: #ffffff;
        outline: 1px;
        margin: 0 auto;
        scale: 0;
        width: 600px;
        height: 300px;
        display: block;
      }
      .img-zoom {
        width: 350px;
        height: 200px;
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        -ms-transition: all .2s ease-in-out;
      }
      .transisi {
          -webkit-transform: scale(1.8); 
          -moz-transform: scale(1.8);
          -o-transform: scale(1.8);
          transform: scale(1.8);
      }
    </style>

  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-secondary static-top">
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="nc-icon x2 nc-bullet-list-67"></i>
    </button>
    <a class="navbar-brand mr-1 text-white btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="http://ae.polman-bandung.ac.id/"><h3>Tool Crib <b>AE</b></h3></a>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-1 bg-secondary"> 
      <div class="text-white py-3">
        <h5>Hallo, <b> {{Session::get('name')}}! </b></h5>
      </div>
    </form>
      
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="profile-icon" id="sidebarToggle" href="#" src="/icon/usericon.png" alt="">  
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="/home_user">Profil</a>
          <a class="dropdown-item" href="/bantuan">Bantuan</a>
          <a class="dropdown-item" href="/tentang">Tentang</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav bg-primary">
      <li class="nav-item active">
        <a class="nav-link" href="/alat">
          <i class="nc-icon lg nc-ruler-pencil"></i>
          <span>Data Alat</span>
        </a>
      </li>

      <li class="nav-item dropdown active">
        <a class="nav-link" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="nc-icon lg nc-layers-3"></i>
          <span>Pinjam & Kembali</span></a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item " href="/pinjam_koin">Sistem Koin</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item " href="/pinjam_ktm">Sistem KTM</a>
          </div>
          <!--<div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Data Peminjaman</h6>
          <a class="dropdown-item " href="#">Sistem Koin</a>
          <a class="dropdown-item " href="#">Sistem KTM</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Data Pengembalian</h6>
          <a class="dropdown-item " href="#">Sistem Koin</a>
          <a class="dropdown-item " href="#">Sistem KTM</a>
        </div> -->
      </li>


      <li class="nav-item active">
        <a class="nav-link" href="/peminjam">
          <i class="nc-icon lg nc-badge"></i>
          <span>Data Peminjam</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="nc-icon lg nc-notes"></i>
          <span>Laporan</span></a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Pinjam & Kembali</h6>
          <a class="dropdown-item" href="/laporan_pinjam_koin">Sistem Koin</a>
          <a class="dropdown-item" href="/laporan_pinjam_ktm">Sistem KTM</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/laporan_inventaris">Inventaris Alat</a>
        </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <!--<ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/home_user">Profil</a>
          </li>
          <li class="breadcrumb-item"><a href="/tentang">Tentang</a></li>
          <li class="breadcrumb-item"><a href="/bantuan">Bantuan</a></li>
        </ol> -->

      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto text-muted">
            <span>Copyright © Tool Crib AE </span>
            <script>document.write(new Date().getFullYear())</script>
            <span>| </span>
            <a href="https://sttbandung.ac.id/">Magang STTB</a>, made with love for a better web.
          </div>
        </div>
      </footer>

      @yield('content')
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="nc-icon nc-stre-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" untuk keluar atau pilih "Batalkan" untuk tetap login.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
          <a class="btn btn-primary" href="/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
<!-- /#wrapper -->


<!-- Bootstrap core JavaScript-->
<script src="/dashboard_assets/jquery.min.js"></script>
  <script src="/dashboard_assets/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/dashboard_assets/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="/dashboard_assets/Chart.min.js"></script>
  <script src="/dashboard_assets/jquery.dataTables.js"></script>
  <script src="/dashboard_assets/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/dashboard_assets/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="/dashboard_assets/datatables-demo.js"></script>
  <script src="/dashboard_assets/chart-area-demo.js"></script>

</body>

</html>