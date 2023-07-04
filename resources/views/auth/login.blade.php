<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SPK Dana BLT</title>

    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/icon/sepang-favico.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/icon/sepang-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/icon/sepang-16x16.png')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">   
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="{{asset('assets/icon/sepang-100x100.png')}}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
      
    </div>
    <div class="card-body">
      <div class="text-center">
        <h5><strong>APLIKASI PENENTU PENERIMAAN DANA BANTUAN LANGSUNG TUNAI PADA KELURAHAN SEPANG</strong></h5>
      </div>

      <form action="{{url('postLogin')}}" method="post">
        {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" required placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" required placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">          
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
