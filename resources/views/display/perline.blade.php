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

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden sidebar-hidden" style="background: #f8f8f8">
  <div class="container-fluid">
    <header style="background: #fff; border-bottom: 1px solid #a4b7c1" class="row">
        <nav class="navbar navbar-light col-md-2">
            <a href="#" class="navbar-brand">
                <img width="150px" src="{{ asset('images/logo.png') }}" alt="Display App">
            </a>
        </nav>
        <div style="padding: 5px" class="text-center title col-md-8">
            <h3>Real Time Lab Report</h3>
            <input type="hidden" id="dept" value="{{ $dept }}">
            <input type="hidden" id="line" value="{{ $line }}">
            <span class="dept">@if($dept != '') {{ $dept }} @else DEPT @endif</span><span class="line"> @if($line != '') {!! str_replace('-', ' ', $line) !!} @else LINE @endif</span>
        </div>
        <div style="padding: 5px; padding-right: 15px" class="text-right col-md-2">
            <h4 class="time">11:30:00</h4>
            <span class="date">27 Maret 2018</span>
        </div>
    </header>
    <hr />
  </div>
  <div class="container-fluid" style="flex-grow: 1">
      <h2 style="margin-left: 10px">Sample Minyak</h2>
      <div id="sample-minyak" class="row">
          <div class="col-md-5 hasil-sample">
              <table style="background: #fff" class="table">
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
                                          <th style="border-left: 0px !important"><span>BKA</span> <br>(<span class="jam-sample-pv-BKA">00:00</span>)</th>
                                          <th>MP <br>(<span class="jam-sample-pv-MP">00:00</span>)</th>
                                          <th style="border-right: 0px !important">BKB <br>(<span class="jam-sample-pv-BKB">00:00</span>)</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td style="border-left: 0px !important"> <span style="font-size: 25px" class="nilai-sample-pv-BKA">0.00</span></td>
                                          <td><span style="font-size: 25px" class="nilai-sample-pv-MP">0.00</span></td>
                                          <td style="border-right: 0px !important"><span style="font-size: 25px" class="nilai-sample-pv-BKB">0.00</span></td>
                                      </tr>
                                  </tbody>
                              </table>
                          </td>
                          <td style="padding: 0 !important">
                              <h2 style="padding: 0">FFA</h2>
                              <table style="width: 100%">
                                  <thead>
                                      <tr>
                                          <th style="border-left: 0px !important">BKA <br>(<span class="jam-sample-ffa-BKA">07:00</span>)</th>
                                          <th>MP <br>(<span class="jam-sample-ffa-MP">07:00</span>)</th>
                                          <th style="border-right: 0px !important">BKB <br>(<span class="jam-sample-ffa-BKB">07:00</span>)</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td style="border-left: 0px !important"><span style="font-size: 25px" class="nilai-sample-ffa-BKA">0.0000</span></td>
                                          <td><span style="font-size: 25px" class="nilai-sample-ffa-MP">0.0000</span></td>
                                          <td style="border-right: 0px !important"><span style="font-size: 25px" class="nilai-sample-ffa-BKB">0.0000</span></td>
                                      </tr>
                                  </tbody>
                              </table>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
          <div class="col-md-5 disposisi">
              <table style="background: #fff" class="table">
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
                  <tbody class="text-center" style="font-weight: bold; font-size: 1.5em">
                      <tr>
                          <th>PV</th>
                          <td class="pv-komposisi-lokal">
                              30%BB <br> 70%BK
                          </td>
                          <td class="pv-komposisi-export">
                              30%BB <br> 70%BK
                          </td>
                          <td>
                              OK, <br> samplingulang1/2jam
                          </td>
                      </tr>
                      <tr>
                          <th>FFA</th>
                          <td class="ffa-komposisi-lokal">
                              40%BB <br> 60%BK
                          </td>
                          <td class="ffa-komposisi-export">
                              40%BB <br> 60%BK
                          </td>
                          <td>
                              Release,CutProses, <br> Komposisi
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
          <div class="col-md-2 history">
              <table style="background: #fff" class="table">
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
          <div class="col-md-4 history">
              <table style="background: #fff" class="table table-bordered">
                  <thead>
                      <tr style="background: #bc0303; color: #fff" class="text-center">
                          <th>#</th>
                          <th><i class="fa fa-clock-o"></i></th>
                          <th>FC</th>
                          <th>KA</th>
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
     function get_sample_result(tangki) {
         $.ajax({
            url: "{{ URL::to('display/minyak/get-last/') }}/"+tangki+"/"+$('#dept').val()+"/"+$('#line').val(),
            type: "GET",
            dataType: "JSON",
            success: function (response) {
              $('.jam-sample-pv-'+tangki).text(response.sample_time.substr(0,5))
              $('.nilai-sample-pv-'+tangki).text(response.nilai_pv)
              $('.jam-sample-ffa-'+tangki).text(response.sample_time.substr(0,5))
              $('.nilai-sample-ffa-'+tangki).text(response.nilai_ffa)
              if (tangki = 'MP') {
                // Untuk menampilkan komposisi pv
                if(response.nilai_pv < 3.31) {
                  $('.pv-komposisi-lokal').html('OK');
                  $('.pv-komposisi-export').html('OK');
                }else if(response.nilai_pv >= 3.31 && response.nilai_pv <= 3.50 ) {
                  $('.pv-komposisi-lokal').html('lK');
                  $('.pv-komposisi-export').html('lK');
                }else if(response.nilai_pv >= 3.51 && response.nilai_pv <= 3.80 ) {
                  $('.pv-komposisi-lokal').html('OK');
                  $('.pv-komposisi-export').html('40% BB <br/> 60% BK');
                }else if(response.nilai_pv >= 3.81 && response.nilai_pv <= 4.0 ) {
                  $('.pv-komposisi-lokal').html('40% BB <br/> 60% BK');
                  $('.pv-komposisi-export').html('50% BB <br/> 50% BK');
                }else if(response.nilai_pv >= 4.01 && response.nilai_pv <= 4.50 ) {
                  $('.pv-komposisi-lokal').html('50% BB <br/>  50% BK');
                  $('.pv-komposisi-export').html('60% BB <br/> 30% BK');
                }else if(response.nilai_pv >= 4.51 && response.nilai_pv <= 5.0 ) {
                  $('.pv-komposisi-lokal').html('70% BB <br/> 30% BK');
                  $('.pv-komposisi-export').html('70% BB <br/> 30% BK');
                }else if(response.nilai_pv > 5.0 ) {
                  $('.pv-komposisi-lokal').html('100% BB <br/> 0% BK');
                  $('.pv-komposisi-export').html('100% BB <br/> 0% BK');
                }else{
                  $('.pv-komposisi-lokal').html('No read');
                  $('.pv-komposisi-export').html('No read'); 
                }
                // Untuk menampilkan komposisi FFA
                if(response.nilai_ffa < 0.2000) {
                  $('.ffa-komposisi-lokal').html('OK');
                  $('.ffa-komposisi-export').html('OK');
                }else if(response.nilai_ffa >= 0.2000 && response.nilai_ffa <= 0.2350 ) {
                  $('.ffa-komposisi-lokal').html('lK');
                  $('.ffa-komposisi-export').html('lK');
                }else if(response.nilai_ffa >= 0.2350 && response.nilai_ffa <= 2.500 ) {
                  $('.ffa-komposisi-lokal').html('40% BB <br/> 60% BK');
                  $('.ffa-komposisi-export').html('50% BB <br/> 60% BK');
                }else if(response.nilai_ffa >= 0.2501 && response.nilai_ffa <= 0.2750 ) {
                  $('.ffa-komposisi-lokal').html('50% BB <br/> 50% BK');
                  $('.ffa-komposisi-export').html('60% BB <br/> 30% BK');
                }else if(response.nilai_ffa >= 0.2751 && response.nilai_ffa <= 0.4000 ) {
                  $('.ffa-komposisi-lokal').html('70% BB <br/>  30% BK');
                  $('.ffa-komposisi-export').html('70% BB <br/> 30% BK');
                }else if(response.nilai_ffa > 0.4000 ) {
                  $('.ffa-komposisi-lokal').html('100% BB <br/> 0% BK');
                  $('.ffa-komposisi-export').html('100% BB <br/> 0% BK');
                }else{
                  $('.ffa-komposisi-lokal').html('No read');
                  $('.ffa-komposisi-export').html('No read'); 
                }
              }
            },
            error: function (error) {
                console.log(error.response);
            }
         })
     }
     if ($('#dept').val() != '' && $('#line').val() != '') {
         setInterval(function() {
             get_sample_result('MP')
             get_sample_result('BKA')
             get_sample_result('BKB')
          }, 1000);
          get_sample_result('MP')
          get_sample_result('BKA')
          get_sample_result('BKB')
      }

   </script>
</body>
</html>
