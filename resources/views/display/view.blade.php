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

</head>

<body class="app container-fluid">

    <header style="background: #fff; border-bottom: 1px solid #a4b7c1" class="row">
        <nav class="navbar navbar-light col-md-2">
            <a href="#" class="navbar-brand">
                <img width="150px" src="{{ asset('images/logo.png') }}" alt="Display App">
            </a>
        </nav>
        <div style="padding: 5px" class="text-center title col-md-8">
            <h3>Real Time Lab Report</h3>
            <span class="line">Line : LINE 1</span>
        </div>
        <div style="padding: 5px" class="text-right time col-md-2">
            <h4 class="time">11:30:00</h4>
            <span class="date">27 Maret 2018</span>
        </div>
    </header>
    <hr />
    <div class="row">
        <div id="sample-minyak" class="col-md-12">
            <div class="col-md-3 hasil-sample">
                <table style="background: #fff" class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">Jam Sample Terakhir MP : 07:00</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>
                                <h2 style="padding: 0">PV</h2>
                                <span style="font-size: 20px">0.09</span>
                            </td>
                            <td>
                                <h2>FFA</h2>
                                <span>0.1026</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  <script src="{{ asset('assets/js/moment.min.js') }}"></script>
  <script type="text/javascript">
      moment.locale('id');
  </script>
  <script src="{{ asset('assets/js/app.js') }}"></script>

  <script>
       window.Laravel = {!! json_encode([
           'csrfToken' => csrf_token(),
       ]) !!};
   </script>
</body>
</html>
