<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Lab Report App PT. PAS">
  <meta name="author" content="ITE PT.PAS">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
  <title>Lab Report | Login Aplikasi</title>
  {{-- Style --}}
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>
<body class="app flex-row align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="alert alert-danger gagal" style="display: none">
            <i class="fa fa-close"></i> Login gagal. Periksa kembali NIK dan password anda. Dan pastikan user aktif.
        </div>
        <div class="card-group">
          <div class="card p-4">
            <div class="card-body">
              <h1>Login Lab Report</h1>
              <p class="text-muted">Gunakan NIK dan password untuk login</p>
              <form id="login" action="" method="post">
                @csrf
                @method('post')
                <div id="nik" class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-user"></i></span>
                  </div>
                  <input name="nik" type="text" class="form-control" placeholder="NIK">
                  <span class="invalid-feedback"></span>
                </div>
                <div id="password" class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-lock"></i></span>
                  </div>
                  <input name="password" type="password" class="form-control" placeholder="Password">
                  <span class="invalid-feedback"></span>
                </div>
                <div class="row">
                  <div class="col-6">
                    <button type="submit" class="btn btn-danger px-4">Login</button>
                  </div>
                  <div class="col-6 text-right">
                    <a style="display: none" class="btn btn-link px-0">Forgot password?</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/js/app.js') }}"></script>
  <script type="text/javascript">
  $(function() {
      $('#login').on('submit', (event) => {
          $('.gagal').hide();
          event.preventDefault();
          $.ajax({
              url : "{{ route('login.authenticate') }}",
              data  : {
                  nik : $('#nik input').val(),
                  password : $('#password input').val()
              },
              type  : $('input[name=_method]').val(),
              dataType  : 'JSON',
              success: (response) => {
                  if (response.success == 1) {
                      window.location = "{{ route('home') }}"
                  }
                  $(this).addClass('was-error');
                  if(response.errors.nik) {
                      $('#nik input').addClass('is-invalid');
                      $('#nik .invalid-feedback').text(response.errors.nik);
                  }else{
                      $('#nik input').removeClass('is-invalid');
                  }
                  if(response.errors.password) {
                      $('#password input').addClass('is-invalid');
                      $('#password .invalid-feedback').text(response.errors.password);
                  }else{
                      $('#password input').removeClass('is-invalid');
                  }
              },
              error: (error) => {
                  console.log(error);
                  if (error.status == 401) {
                      $('.gagal').show();
                  }
              }

          })
      });
      $('.forget').click(function(event) {
          event.preventDefault();
          $.ajax({
              url: "{{ route('logout') }}",
              type: 'POST',
              dataType: 'JSON',
              success: (response) => {
                  if (response.success == '1') {
                      window.location = "{{ route('home') }}"
                  }
              },
              error: (error) => {
                  console.log(error)
              }
          })
      })
  })
  </script>
</body>
</html>