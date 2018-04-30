<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Display Lab Report App PT. PAS">
  <meta name="author" content="ITE PT.PAS">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
  <title>Lab Report | Display sample result</title>
  {{-- Style --}}
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
  <style type="text/css">
      .history td {
          padding: 0.25rem
      }
  </style>

</head>

<body class="app">
    <div class="container-fluid">
      <header style="background: #fff; border-bottom: 1px solid #a4b7c1" class="row">
          <nav class="navbar navbar-light col-md-2">
              <a href="#" class="navbar-brand">
                  <img width="150px" src="{{ asset('images/logo.png') }}" alt="Display App">
              </a>
          </nav>
          <div style="padding: 5px" class="text-center title col-md-8">
              <h3>Real Time Lab Report</h3>
              <span class="dept">Pilih department dan line</span>
          </div>
          <div style="padding: 5px; padding-right: 15px" class="text-right col-md-2">
              <h4 class="time">11:30:00</h4>
              <span class="date">27 Maret 2018</span>
          </div>
      </header>
      <hr/>
    </div>
    <div class="app-body">
      <main class="main container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  Display Per Line
              </div>
              <div class="card-body">
                  <div class="form-group row">
                      <div class="col-md-2">
                        <select class="form-control" name="">
                            <option value="">-- Department --</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->name }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <footer class="app-footer" style="top: 0">
      <span>ITE © 2018 PT. Prakarsa Alam Segar.</span>
    </footer>
  <script src="{{ asset('assets/js/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
  <script type="text/javascript">
    moment.locale('id');
     window.Laravel = {!! json_encode([
         'csrfToken' => csrf_token(),
     ]) !!};

    var count = 1;
    function setTime(time)
    {
        if (time < 10) {
           return '0'+time;
        }
        return time;
    }
    setInterval(function() {
        var date = new Date();
        var h = setTime(date.getHours());
        var i = setTime(date.getMinutes());
        var s = setTime(date.getSeconds());
        var d = setTime(date.getDate());
        var month = date.getMonth();
        var y = date.getYear();
        $('.time').text(h+':'+i+':'+s);
     }, 1000)

   </script>
</body>
</html>
