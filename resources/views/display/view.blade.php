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
        <h2 style="margin-left: 10px">Sample Minyak</h2>
        <div id="sample-minyak" class="row">
            <div class="col-md-5 hasil-sample">
                <table style="background: #fff" class="table table-bordered">
                    <thead>
                        <tr style="background: #bc0303; color: #fff">
                            <th colspan="2">Info apa aja</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td style="padding: 0 !important">
                                <h2 style="padding: 0">PV</h2>
                                <table style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="border-left: 0px !important"><span>BKA</span> <br>(<span class="jam-sample-pv-bka">07:00</span>)</th>
                                            <th>MP <br>(<span class="jam-sample-pv-mp">07:00</span>)</th>
                                            <th style="border-right: 0px !important">BKB <br>(<span class="jam-sample-pv-bkb">07:00</span>)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="border-left: 0px !important"> <span style="font-size: 25px">0.09</span></td>
                                            <td><span style="font-size: 25px">0.09</span></td>
                                            <td style="border-right: 0px !important"><span style="font-size: 25px">0.09</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="padding: 0 !important">
                                <h2 style="padding: 0">FFA</h2>
                                <table style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="border-left: 0px !important">BKA <br>(<span class="jam-sample-ffa-bka">07:00</span>)</th>
                                            <th>MP <br>(<span class="jam-sample-ffa-mp">07:00</span>)</th>
                                            <th style="border-right: 0px !important">BKB <br>(<span class="jam-sample-ffa-bkb">07:00</span>)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="border-left: 0px !important"><span style="font-size: 25px">0.1026</span></td>
                                            <td><span style="font-size: 25px">0.1026</span></td>
                                            <td style="border-right: 0px !important"><span style="font-size: 25px">0.1026</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-5 disposisi">
                <table style="background: #fff" class="table table-bordered">
                    <thead>
                        <tr style="background: #bc0303; color: #fff" class="text-center">
                            <th class="text-center" rowspan="2"><i class="fa fa-flask"></i></th>
                            <th colspan="2" style="padding: 0; border-bottom-width: 0px !important">Komposisi</th>
                            <th rowspan="2">Dsiposisi</th>
                        </tr>
                        <tr style="background: #bc0303; color: #fff" class="text-center">
                            <th style="padding: 0">Lokal</th>
                            <th style="padding: 0">Export</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" style="font-weight: bold">
                        <tr>
                            <th>PV</th>
                            <td>
                                30%BB–70%BK
                            </td>
                            <td>
                                30%BB–70%BK
                            </td>
                            <td>
                                OK,samplingulang1/2jam
                            </td>
                        </tr>
                        <tr>
                            <th>FFA</th>
                            <td>
                                40%BB–60%BK
                            </td>
                            <td>
                                40%BB–60%BK
                            </td>
                            <td>
                                Release,CutProses,Komposisi
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2 history">
                <table style="background: #fff" class="table table-bordered">
                    <thead>
                        <tr style="background: #bc0303; color: #fff" class="text-center">
                            <th>#</th>
                            <th><i class="fa fa-clock-o"></i></th>
                            <th>PV</th>
                            <th>FFA</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" style="font-weight: bold">
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
        <h2 style="margin-left: 10px">Sample Mie</h2>
        <div id="sample-mie" class="row">
            <div class="col-md-3 hasil-sample">
                <table style="background: #fff" class="table table-bordered">
                    <thead>
                        <tr style="background: #bc0303; color: #fff">
                            <th colspan="2">Shif : 1, Variant : Soto</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>
                                <h2 style="padding: 0">FC</h2>
                                <span style="font-size: 25px">0.09</span>
                            </td>
                            <td>
                                <h2>KA</h2>
                                <span style="font-size: 25px">0.1026</span>
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
