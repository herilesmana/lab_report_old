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

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden sidebar-hidden">
  <div class="container-fluid">
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
        <div style="padding: 5px" class="text-right col-md-2">
            <h4 class="time">11:30:00</h4>
            <span class="date">27 Maret 2018</span>
        </div>
    </header>
    <hr />
    <div>
        <div id="sample-minyak" class="row">
            <div class="col-md-3 hasil-sample">
                <table style="background: #fff" class="table table-bordered">
                    <thead>
                        <tr style="background: #bc0303; color: #fff">
                            <th colspan="2">Jam Sample Terakhir MP : 07:00</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>
                                <h2 style="padding: 0">PV</h2>
                                <span style="font-size: 40px">0.09</span>
                            </td>
                            <td>
                                <h2>FFA</h2>
                                <span style="font-size: 40px">0.1026</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-5 disposisi">
                <table style="background: #fff" class="table table-bordered">
                    <thead>
                        <tr style="background: #bc0303; color: #fff" class="text-center">
                            <th class="text-center"><i class="fa fa-flask"></i></th>
                            <th>Komposisi</th>
                            <th>Dsiposisi</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th>PV</th>
                            <td>
                                30%BB–70%BK
                            </td>
                            <td>
                                OK,samplingulang1/2jam
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>FFA</th>
                            <td>
                                40%BB–60%BK
                            </td>
                            <td>
                                Release,CutProses,Komposisi
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 history">
                <table style="background: #fff" class="table table-bordered">
                    <thead>
                        <tr style="background: #bc0303; color: #fff" class="text-center">
                            <th>#</th>
                            <th><i class="fa fa-clock-o"></i></th>
                            <th>PV</th>
                            <th>FFA</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>1</td>
                            <td>07:30</td>
                            <td>1.94</td>
                            <td>0.1179</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>07:30</td>
                            <td>1.94</td>
                            <td>0.1179</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>07:30</td>
                            <td>1.94</td>
                            <td>0.1179</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>07:30</td>
                            <td>1.94</td>
                            <td>0.1179</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>07:30</td>
                            <td>1.94</td>
                            <td>0.1179</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="sample-mie" class="row">
            <div class="col-md-3 hasil-sample">
                <table style="background: #fff" class="table table-bordered">
                    <thead>
                        <tr style="background: #bc0303; color: #fff">
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
            <div class="col-md-5 disposisi">
                <table style="background: #fff" class="table table-bordered">
                    <thead>
                        <tr style="background: #bc0303; color: #fff" class="text-center">
                            <th class="text-center"><i class="fa fa-flask"></i></th>
                            <th>Komposisi</th>
                            <th>Dsiposisi</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th>PV</th>
                            <td>
                                30%BB–70%BK
                            </td>
                            <td>
                                OK,samplingulang1/2jam
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>FFA</th>
                            <td>
                                40%BB–60%BK
                            </td>
                            <td>
                                Release,CutProses,Komposisi
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 history">
                <table style="background: #fff" class="table table-bordered">
                    <thead>
                        <tr style="background: #bc0303; color: #fff" class="text-center">
                            <th>#</th>
                            <th><i class="fa fa-clock-o"></i></th>
                            <th>PV</th>
                            <th>FFA</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>1</td>
                            <td>07:30</td>
                            <td>1.94</td>
                            <td>0.1179</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>07:30</td>
                            <td>1.94</td>
                            <td>0.1179</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>07:30</td>
                            <td>1.94</td>
                            <td>0.1179</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>07:30</td>
                            <td>1.94</td>
                            <td>0.1179</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>07:30</td>
                            <td>1.94</td>
                            <td>0.1179</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
    <footer class="app-footer" style="top: 0">
      <span>ITE © 2018 PT. Prakarsa Alam Segar.</span>
    </footer>
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
   <script type="text/javascript">
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
