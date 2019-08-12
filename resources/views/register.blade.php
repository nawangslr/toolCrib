<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- For Google -->
    <link rel="author" href="https://plus.google.com/+Scoopthemes">
    <link rel="publisher" href="https://plus.google.com/+Scoopthemes">

    <!-- Canonical -->
    <link rel="canonical" href="">

    <title>Tool Crib AE</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <!-- font Awesome CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <!-- Main Styles CSS -->
    <link href="/admin_assets/css/main.css" rel="stylesheet">

    <style>
      
      .form-signin {
          max-width: 330px;
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
      .form-signin input[type="email"] {
          margin-bottom: -1px;
          border-bottom-left-radius: 0;
          border-bottom-right-radius: 0;
      }
      .form-signin input[type="password"] {
          margin-bottom: 10px;
          border-bottom-left-radius: 0;
          border-bottom-right-radius: 0;
      }
      .account-wall {
          margin-top: 20px;
          padding: 40px 0px 20px 0px;
          background-color: #f7f7f7;
          -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
          -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
          box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      }
      .login-title {
          color: #555;
          font-size: 28px;
          font-weight: 400;
          display: block;
      }
      .new-account {
          display: block;
          margin-top: 10px;
          text-align: center;
      }
      .profile-image {
        width: 96px;
        height: 96px;
        margin: 0 auto 10px;
        display: block;
        -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
          box-sizing: border-box;
      }
    </style>      
  </head>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">
    
        <div class="col-md-4 col-sm-12 col-md-offset-4">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <br><h1 class="text-center login-title">Register Sebagai Admin</h1><hr width="80%">
          <div class="account-wall">
            <form action="{{ url('/registerPost') }}" method="post" class="form-signin">
                {{ csrf_field() }}
                <div class="form-group">
                    <img class="profile-image" src="/icon/logopolman.png" alt="">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required autofocus><br>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required><br>
                    <input type="password" class="form-control" id="confirmation" name="confirmation" placeholder="Konfirmasi Password" required><br>
                    <input type="text"  class="form-control" id="name" name="name" placeholder="Nama Lengkap" required autofocus><br>
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
                    <button type="reset" class="btn btn-lg btn-danger btn-block">Batalkan</button>
                </div>
            </form>
            <h5 class="new-account">Sudah punya akun? <a href="{{url('login')}}">Login</a><h5>
        </div>

    @yield('content') {{-- Semua file konten kita akan ada di bagian ini --}}


</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<!-- Custom JavaScript -->
<script src="/admin_assets/js/custom.js"></script> 
</body>

</html>