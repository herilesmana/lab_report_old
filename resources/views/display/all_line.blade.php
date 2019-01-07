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
  <title>Lab Report | Display All Line <?php if (isset($dept)) { echo $dept->name;} ?></title>
  {{-- Style --}}
  <link href="{{ asset('assets/css/style2.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/tempusdominus-bootstrap-42.min.css') }}" rel="stylesheet">
  <style type="text/css">
      .table td {
          padding-top: 0.25rem;
          padding-bottom: 0.30rem !important;
      }
      h2.judul {
        border-bottom: 1px solid #000
      }
      thead tr {
        background: #bc0303;
        color: #fff
      }
      header {
        background: #fff;
        box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12)
      }
      .body-table {
        margin-top: 10px;
      }
      .mark-green {
          box-shadow: inset 0 2px 7px 0 rgba(77,189,116,.7), inset 0 2px 10px 0 rgba(77,189,116,.8)
      }
      .mark-red {
          box-shadow: inset 0 2px 7px 0 rgba(248,108,107,.7), inset 0 2px 10px 0 rgba(248,108,107,.8)
      }
      .mark-yellow {
          box-shadow: inset 0 2px 7px 0 rgba(255,193,7,.7), inset 0 2px 10px 0 rgba(255,193,7,.8)
      }
  </style>

</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden sidebar-hidden" style="background: #fff">
  <div class="container-fluid">
    <!-- Header -->
    <header class="row">
        <nav class="navbar navbar-light col-md-2">
            <a href="#" class="navbar-brand">
                <img width="150px" src="{{ asset('images/logo.png') }}" alt="Display App">
            </a>
        </nav>
        <div style="padding: 5px" class="text-center title col-md-8">
            <h3>Real Time Lab Report</h3>
            <span class="dept">Dept : <?php if (isset($dept)) { echo $dept->name;} ?></span>
        </div>
        <div style="padding: 5px; padding-right: 15px" class="text-right col-md-2">
            <h4 class="time">00:00:00</h4>
            <span class="date">00 Januari 2000</span>
        </div>
    </header>
  </div>
  <div class="container-fluid">
      <div class="col-sm-12">
          <table class="table table-bordered body-table table-striped" width="100%">
            <thead>
              <tr>
                <th class="text-center">LINE</th>
                <th class="text-center">VARIANT</th>
                <th class="text-center">SAMPLE</th>
                <th class="text-center">CREATE</th>
                <th class="text-center">PV</th>
                <th class="text-center">FFA</th>
                <th class="text-center">FC</th>
                <th class="text-center">KA</th>
                <th class="text-center">KOMPOSISI</th>
                <th class="text-center">KETERANGAN</th>
              </tr>
            </thead>
            <tbody id="lines">
            </tbody>
          </table>
      </div>
  </div>
<!--    <footer class="app-footer" style="top: 0">
      <span>ITE © 2018 PT. Prakarsa Alam Segar.</span>
    </footer> -->
  <script src="{{ asset('assets/js/moment.min.js') }}"></script>
  <script type="text/javascript">
      moment.locale('id');
      localStorage.clear();
  </script>
  <script src="{{ asset('assets/js/app.js') }}"></script>

  <script>
       window.Laravel = {!! json_encode([
           'csrfToken' => csrf_token(),
       ]) !!};
   </script>
   <script type="text/javascript">
    // Untuk set waktu, ditambah 0 jika kurang dari 10
    var count = 1;
    function setTime(time)
    {
        if (time < 10) {
           return '0'+time;
        }
        return time;
    }
    var no = 1;
    // Untuk tanggal kanan atas
    setInterval(function() {
        var date = new Date();
        var h = setTime(date.getHours());
        var i = setTime(date.getMinutes());
        var s = setTime(date.getSeconds());
        var d = setTime(date.getDate());
        var dateString = date.toString();
        var arrDate = dateString.split(' ');
        htmlDate = arrDate[0] + ", " + arrDate[2] + " " + arrDate[1] + " " + arrDate[3];
        $('.time').text(h+':'+i+':'+s);
        $('.date').html(htmlDate);
     }, 1000);
    // Fungsi untuk kedip background, dan mati setelah 10 menit
    function kedip_background(line, warna)
    {
      var no = 1;
      var bg_shake = setInterval(function () {
          if (no%2 == 0) {
              $('#'+line).addClass(warna);
          }else{
              $('#'+line).removeClass(warna);
          }
          no++;
      }, 1000);
      setTimeout(function () {
          clearInterval(bg_shake);
          $('#'+line).removeClass(warna);
      }, 600000)
    }
      // Untuk BB
      get_minyak_bb("<?php echo $dept->name; ?>");
      setInterval( function () {
        get_minyak_bb("<?php echo $dept->name; ?>");
      }, 30000)
      // Untuk minyak proses
      $.ajax({
        url : "{{ URL::to('line/per_department') }}/<?php echo $dept->id; ?>",
        type : "GET",
        dataType : 'JSON',
        success : function (response)
        {
          if (response.length != 0) {
            var no = 0;
            $('#lines').html('');
            $.each(response, (index, item) => {
                no++;
                if (item.id != 'LINE 02 CUP' && item.id != 'LINE 03 CUP' && item.id != 'LINE 04 CUP') {
                  $('#lines').append(`
                      <tr id="`+item.id.replace(/ |:/gi,'-').toLowerCase()+`">
                        <td>`+item.id+`</td>
                        <td class="variant"></td>
                        <td class="sample_time"></td>
                        <td class="sample_create"></td>
                        <td class="pv"></td>
                        <td class="ffa"></td>
                        <td><span class="fc"></span></td>
                        <td><span class="ka"></span></td>
                        <td class="komposisi text-center" style="font-weight: bold"></td>
                        <td class="disposisi text-center" style="font-weight: bold"></td>
                      </tr>
                  `);
                  setInterval( function () {
                    get_minyak_result("<?php echo $dept->name; ?>",item.id.replace(/ |:/gi,'-'));
                    get_mie_result("<?php echo $dept->name; ?>",item.id.replace(/ |:/gi,'-'));
                  }, 15000)
                }
            })
          }
        },
        error : function (error)
        {
            // console.log(error)
        }
      });
    function disposisi_lokal_ffa(line, nilai_ffa)
    {
      var disposisi = "";
      var komposisi = "";
      var background = "";
      if( nilai_ffa < 0.2000) {
        komposisi = "-";
        disposisi = "A";
        background = "mark-green";
      }else if( nilai_ffa >= 0.2000 && nilai_ffa <= 0.2150 ) {
        komposisi = "20% BB - 80% BK";
        disposisi = "A";
        background = "mark-green";
      }else if( nilai_ffa > 0.2150 && nilai_ffa <= 0.2350 ) {
        komposisi = "30% BB - 70% BK";
        disposisi = "B";
        background = "mark-yellow";
      }else if( nilai_ffa > 0.2350 && nilai_ffa <= 2.500 ) {
        komposisi = "40% BB - 60% BK";
        disposisi = "C";
        background = "mark-red";
      }else if( nilai_ffa >= 0.2501 && nilai_ffa <= 0.2750 ) {
        komposisi = "50% BB - 50% BK";
        disposisi = "D";
        background = "mark-red";
      }else if( nilai_ffa >= 0.2751 && nilai_ffa <= 0.4000 ) {
        komposisi = "70% BB - 30% BK";
        disposisi = "E";
        background = "mark-red";
      }else if( nilai_ffa > 0.4000 ) {
        komposisi = "100% BB";
        disposisi = "F";
        background = "mark-red";
      }
      $('#'+line+" .disposisi").html(disposisi);
      $('#'+line+" .komposisi").html(komposisi);
      kedip_background(line, background);
    }
    function disposisi_export_ffa(line, nilai_ffa)
    {
      var disposisi = "";
      var komposisi = "";
      var background = "";
      if( nilai_ffa < 0.2000) {
        komposisi = "-";
        disposisi = "A";
        background = "mark-green";
      }else if( nilai_ffa >= 0.2000 && nilai_ffa <= 0.2350 ) {
        komposisi = "30% BB - 70% BK";
        disposisi = "B";
        background = "mark-yellow";
      }else if( nilai_ffa >= 0.2351 && nilai_ffa <= 2.500 ) {
        komposisi = "40% BB - 60% BK";
        disposisi = "C";
        background = "mark-red";
      }else if( nilai_ffa >= 0.2501 && nilai_ffa <= 0.2750 ) {
        komposisi = "50% BB - 50% BK";
        disposisi = "D";
        background = "mark-red";
      }else if( nilai_ffa >= 0.2751 && nilai_ffa <= 0.4000 ) {
        komposisi = "70% BB - 30% BK";
        disposisi = "E";
        background = "mark-red";
      }else if( nilai_ffa > 0.4000 ) {
        komposisi = "100% BB";
        disposisi = "F";
        background = "mark-red";
      }
      $('#'+line+" .disposisi").html(disposisi);
      $('#'+line+" .komposisi").html(komposisi);
      kedip_background(line, background);
    }
    function disposisi_lokal_pv(line, nilai_pv)
    {
      var disposisi = "";
      var komposisi = "";
      if( nilai_pv < 2.50) {
        komposisi = "-";
        disposisi = "A";
        background = "mark-green";
      }else if( nilai_pv >= 2.50 && nilai_pv <= 3.00 ) {
        komposisi = "-";
        disposisi = "A";
        background = "mark-green";
      }else if( nilai_pv > 3.00 && nilai_pv <= 3.50 ) {
        komposisi = "20% BB - 80% BK";
        disposisi = "A";
        background = "mark-green";
      }else if( nilai_pv > 3.5 && nilai_pv <= 3.80 ) {
        komposisi = "30% BB - 70% BK";
        disposisi = "B";
        background = "mark-yellow";
      }else if( nilai_pv > 3.80 && nilai_pv <= 4.00 ) {
        komposisi = "40% BB - 60% BK";
        disposisi = "C";
        background = "mark-red";
      }else if( nilai_pv > 4.00 && nilai_pv <= 4.50 ) {
        komposisi = "50% BB - 50% BK";
        disposisi = "D";
        background = "mark-red";
      }else if( nilai_pv > 4.50 && nilai_pv <= 5.00 ) {
        komposisi = "70% BB - 30% BK";
        disposisi = "E";
        background = "mark-red";
      }else if( nilai_pv > 5.00 ) {
        komposisi = "100% BB";
        disposisi = "F";
        background = "mark-red";
      }
      $('#'+line+" .disposisi").html(disposisi);
      $('#'+line+" .komposisi").html(komposisi);
      kedip_background(line, background);
    }
    function disposisi_export_pv(line, nilai_pv, edit = 'N')
    {
      var disposisi = "";
      var komposisi = "";
      if( nilai_pv < 3.00) {
        komposisi = "-";
        disposisi = "A";
        background = "mark-green";
      }else if( nilai_pv >= 3.00 && nilai_pv <= 3.30 ) {
        komposisi = "20% BB - 80% BK";
        disposisi = "A";
        background = "mark-green";
      }else if( nilai_pv > 3.30 && nilai_pv <= 3.50 ) {
        komposisi = "30% BB - 70% BK";
        disposisi = "B";
        background = "mark-yellow";
      }else if( nilai_pv > 3.50 && nilai_pv <= 4.10 ) {
        komposisi = "40% BB - 60% BK";
        disposisi = "C";
        background = "mark-red";
      }else if( nilai_pv > 4.10 && nilai_pv <= 4.50 ) {
        komposisi = "50% BB - 50% BK";
        disposisi = "D";
        background = "mark-red";
      }else if( nilai_pv > 4.50 && nilai_pv <= 5.00 ) {
        komposisi = "70% BB - 30% BK";
        disposisi = "E";
        background = "mark-red";
      }else if( nilai_pv > 0.4000 ) {
        komposisi = "100% BB";
        disposisi = "F";
        background = "mark-red";
      }
      if (edit == 'Y') {
        disposisi = '<i>WAIT</i>';
        komposisi = '<i>WAIT</i>';
        background = 'white';
      }
      $('#'+line+" .disposisi").html(disposisi);
      $('#'+line+" .komposisi").html(komposisi);
      kedip_background(line, background);
    }
    function get_minyak_result(dept, line) {
      // Untik minyak
        $.ajax({
            url: "{{ URL::to('display/minyak/get-last/') }}/MP/"+dept+"/"+line,
            type: "GET",
            dataType: "JSON",
            success: function (response) {
              if (response !== null && response.approve == "Y") {
                  function timeScore (h,m) {
                    var hasil = parseInt(h) * 60 + parseInt(m);
                    return hasil;
                  }
                  function getSelisih (t,d) {
                    const h = d.getHours();
                    const m = d.getMinutes();
                    const [th,tm] = t.split(':');

                    return Math.abs(timeScore(th,tm) - timeScore(h,m));
                  }
                  var jam_samples = ['22:30:00','21:00:00','19:30:00','18:00:00','16:30:00','15:00:00','13:30:00','12:00:00','10:30:00','09:00:00','07:30:00','06:00:00','04:30:00','03:00:00','01:30:00','00:00:00'];
                  var jam_now = "{{ date('H:i:s') }}";
                  var currTime = new Date('2018-11-01 '+jam_now);
                  var dua_jam = jam_samples.sort((a,b) => getSelisih(a, currTime) - getSelisih(b, currTime)).slice(0,2);
                  if(dua_jam.includes(response.sample_time)) {
                    $('#'+line.toLowerCase()+' .sample_time').text(response.sample_date+' | '+response.sample_time.substr(0,5))
                    $('#'+line.toLowerCase()+' .sample_create').text(response.input_time.substr(0,5))
                    $('#'+line.toLowerCase()+' .variant').text(response.variant)
                    if (response.edit == 'Y') {
                      $('#'+line.toLowerCase()+' .pv').html('<span style="text-decoration: line-through;background: rgba(0,0,0,0.7)">'+response.nilai_pv.toFixed(2)+'</span>');
                      $('#'+line.toLowerCase()+' .ffa').html('<span style="text-decoration: line-through;background: rgba(0,0,0,0.7)">'+response.nilai_ffa.toFixed(4)+'</span>');
                      disposisi_export_pv(line.toLowerCase(), response.nilai_pv, 'Y');
                    }else{
                      var nilai_percent_pv = 0;
                      var nilai_percent_ffa = 0;
                      var nilai_percent = 0;
                      $('#'+line.toLowerCase()+' .pv').html(response.nilai_pv.toFixed(2))
                      $('#'+line.toLowerCase()+' .ffa').html(response.nilai_ffa.toFixed(4))
                      var jam_sekarang = dept.toLowerCase()+line.toLowerCase()+response.sample_time.substr(0,5);
                      if(jam_sekarang != localStorage.getItem(dept+line+'_jam_before'))
                      {
                          if (response.jenis_variant == 'lokal')
                          {
                              if(response.nilai_pv < 2.50) {
                                nilai_percent_pv = Math.floor((1 / 8) * 100).toFixed(1);
                              }else if(response.nilai_pv >= 2.50 && response.nilai_pv <= 3.00 ) {
                                nilai_percent_pv = Math.floor((2 / 8) * 100).toFixed(1);
                              }else if(response.nilai_pv >= 3.00 && response.nilai_pv <= 3.50 ) {
                                nilai_percent_pv = Math.floor((3 / 8) * 100).toFixed(1);
                              }else if(response.nilai_pv >= 3.51 && response.nilai_pv <= 3.80 ) {
                                nilai_percent_pv = Math.floor((4 / 8) * 100).toFixed(1);
                              }else if(response.nilai_pv >= 3.81 && response.nilai_pv <= 4.00 ) {
                                nilai_percent_pv = Math.floor((5 / 8) * 100).toFixed(1);
                              }else if(response.nilai_pv >= 4.01 && response.nilai_pv <= 4.50 ) {
                                nilai_percent_pv = Math.floor((6 / 8) * 100).toFixed(1);
                              }else if(response.nilai_pv >= 4.51 && response.nilai_pv <= 5.00 ) {
                                nilai_percent_pv = Math.floor((7 / 8) * 100).toFixed(1);
                              }else if(response.nilai_pv > 5.00 ) {
                                nilai_percent_pv = Math.floor((8 / 8) * 100).toFixed(1);
                              }
                              // Untuk menampilkan komposisi FFA
                              if(response.nilai_ffa < 0.2000) {
                                nilai_percent_ffa = Math.floor((1 / 7) * 100).toFixed(1);
                              }else if(response.nilai_ffa >= 0.2000 && response.nilai_ffa <= 0.2150 ) {
                                nilai_percent_ffa = Math.floor((2 / 7) * 100).toFixed(1);
                              }else if(response.nilai_ffa >= 0.2150 && response.nilai_ffa <= 0.2350 ) {
                                nilai_percent_ffa = Math.floor((3 / 7) * 100).toFixed(1);
                              }else if(response.nilai_ffa >= 0.2351 && response.nilai_ffa <= 2.500 ) {
                                nilai_percent_ffa = Math.floor((4 / 7) * 100).toFixed(1);
                              }else if(response.nilai_ffa >= 0.2501 && response.nilai_ffa <= 0.2750 ) {
                                nilai_percent_ffa = Math.floor((5 / 7) * 100).toFixed(1);
                              }else if(response.nilai_ffa >= 0.2751 && response.nilai_ffa <= 0.4000 ) {
                                nilai_percent_ffa = Math.floor((6 / 7) * 100).toFixed(1);
                              }else if(response.nilai_ffa > 0.4000 ) {
                                nilai_percent_ffa = Math.floor((7 / 7) * 100).toFixed(1);
                              }
                              // nilai_percent = Math.max(nilai_percent_pv, nilai_percent_ffa);
                              if ( nilai_percent_ffa >= nilai_percent_pv ) {
                                disposisi_lokal_ffa(line.toLowerCase(), response.nilai_ffa);
                              }else if ( nilai_percent_pv >= nilai_percent_ffa ) {
                                disposisi_lokal_pv(line.toLowerCase(), response.nilai_pv);
                              }
                          }
                          else if(response.jenis_variant == 'export')
                          {
                              if(response.nilai_pv < 3.00) {
                                nilai_percent_pv = Math.floor((1 / 7) * 100).toFixed(1);
                              }else if(response.nilai_pv >= 3.00 && response.nilai_pv <= 3.30 ) {
                                nilai_percent_pv = Math.floor((2 / 7) * 100).toFixed(1);
                              }else if(response.nilai_pv >= 3.30 && response.nilai_pv <= 3.50 ) {
                                nilai_percent_pv = Math.floor((3 / 7) * 100).toFixed(1);
                              }else if(response.nilai_pv >= 3.51 && response.nilai_pv <= 4.00 ) {
                                nilai_percent_pv = Math.floor((4 / 7) * 100).toFixed(1);
                              }else if(response.nilai_pv >= 4.01 && response.nilai_pv <= 4.50 ) {
                                nilai_percent_pv = Math.floor((5 / 7) * 100).toFixed(1);
                              }else if(response.nilai_pv >= 4.51 && response.nilai_pv <= 5.00 ) {
                                nilai_percent_pv = Math.floor((6 / 7) * 100).toFixed(1);
                              }else if(response.nilai_pv > 5.00 ) {
                                nilai_percent_pv = Math.floor((7 / 7) * 100).toFixed(1);
                              }
                              // Untuk menampilkan komposisi FFA
                              if(response.nilai_ffa < 0.2000) {
                                nilai_percent_ffa = Math.floor((1 / 6) * 100).toFixed(1);
                              }else if(response.nilai_ffa >= 0.2000 && response.nilai_ffa <= 0.2350 ) {
                                nilai_percent_ffa = Math.floor((2 / 6) * 100).toFixed(1);
                              }else if(response.nilai_ffa >= 0.2351 && response.nilai_ffa <= 2.500 ) {
                                nilai_percent_ffa = Math.floor((3 / 6) * 100).toFixed(1);
                              }else if(response.nilai_ffa >= 0.2501 && response.nilai_ffa <= 0.2750 ) {
                                nilai_percent_ffa = Math.floor((4 / 6) * 100).toFixed(1);
                              }else if(response.nilai_ffa >= 0.2751 && response.nilai_ffa <= 0.4000 ) {
                                nilai_percent_ffa = Math.floor((5 / 6) * 100).toFixed(1);
                              }else if(response.nilai_ffa > 0.4000 ) {
                                nilai_percent_ffa = Math.floor((6 / 6) * 100).toFixed(1);
                              }
                              // nilai_percent = Math.max(nilai_percent_pv, nilai_percent_ffa);
                              if ( nilai_percent_ffa >= nilai_percent_pv ) {
                                disposisi_export_ffa(line.toLowerCase(), response.nilai_ffa);
                              }else if ( nilai_percent_pv >= nilai_percent_ffa ) {
                                disposisi_export_pv(line.toLowerCase(), response.nilai_pv);
                              }
                          }
                          localStorage.setItem(dept+line+'_jam_before', jam_sekarang);
                      }
                    }
                  }else{
                    $('#'+line.toLowerCase()+' .fc').hide();
                    $('#'+line.toLowerCase()+' .fc').hide();
                  }
              }
            },
            error: function (error) {

            }
        })
    }
    function get_mie_result(dept, line)
    {
      // Untuk mie
      var nilai_fc = '';
      var nilai_ka = '';
      $.ajax({
          url: "{{ URL::to('display/mie/get-last') }}/"+dept+"/"+line,
          type: "GET",
          dataType: "JSON",
          success: function (response) {
            if (response !== null) {
              // console.log(response.with_fc)
              if (response.sample_date == "{{ date('Y-m-d') }}") {
                if( response.with_fc == "Y") {
                    if (response.approve_fc == "Y") {
                      nilai_fc = response.shift+' : '+response.nilai_fc.toFixed(2);
                    }else{
                      nilai_fc = response.shift+' : '+"<i>Wait</i>";
                    }
                    if ( response.approve == "Y" ) {
                      nilai_ka = response.shift+' : '+response.nilai_ka.toFixed(2);
                    }else{
                      nilai_ka = response.shift+' : '+"<i>Wait</i>";
                    }
                }else{
                    if ( response.approve == "Y" ) {
                      nilai_ka = response.shift+' : '+response.nilai_ka.toFixed(2);
                    }else{
                      nilai_ka = response.shift+' : '+"<i>Wait</i>";
                    }
                    nilai_fc = '<div style="margin: 10px auto; height:1px; width: 100%;background: #000"></div>';
                }
                $('#'+line.toLowerCase()+' .fc').html(nilai_fc);
                $('#'+line.toLowerCase()+' .ka').html(nilai_ka);
              }
            }
          },
          error: function (error) {

          }
      })
    }
    function get_minyak_bb(dept)
    {
        $.ajax({
          url : "{{ URL::to('display/minyak/get-bb') }}/"+dept,
          type : "GET",
          dataType : 'JSON',
          success : function (response)
          {
            if (dept.toLowerCase() == 'prn') {
              var line = 'bb-noodle-bag';
            }else if(dept.toLowerCase() == 'pnc'){
              var line = 'bb-noodle-cup';
            } else {
              var line = '';
            }
              $('#'+line.toLowerCase()+' .sample_time').text(response.shift)
              $('#'+line.toLowerCase()+' .sample_create').text('-')
              $('#'+line.toLowerCase()+' .variant').text('-')
              $('#'+line.toLowerCase()+' .pv').text(response.nilai_pv.toFixed(2))
              $('#'+line.toLowerCase()+' .ffa').text(response.nilai_ffa.toFixed(4))
              $('#'+line.toLowerCase()+' .fc').text('-')
              $('#'+line.toLowerCase()+' .ka').text('-')
              $('#'+line.toLowerCase()+' .komposisi').text('-')
              $('#'+line.toLowerCase()+' .disposisi').text('-')

          },
          error : function (error)
          {

          }
        })
    }

   </script>
</body>
</html>
