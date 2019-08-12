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
            
                </div>
            </div>
        </div>

         <!-- Modal Tambah Data-->
         
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection