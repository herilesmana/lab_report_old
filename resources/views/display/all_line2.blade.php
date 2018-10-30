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
  <title>Lab Report | Display All Line</title>
  {{-- Style --}}
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
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
      .container-fluid {
          font-weight: bold
      }
      ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
      }
      table td {
        vertical-align: middle ! important
      }
  </style>

</head>

<?php if (!isset($dept)): ?>
<div class="container" style="margin-top:20px">
  <a href="{{ URL::to('display') }}" class="btn btn-primary">Go to display</a>
</div>
<?php else: ?>

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
          <table class="table table-bordered body-table table-striped">
            <thead>
              <tr>
                <th width="130">LINE</th>
                <th width="100">VARIANT</th>
                <th width="80">SAMPLE</th>
                <th width="80">CREATE</th>
                <th width="60">FC</th>
                <th width="60">KA</th>
                <th>PV</th>
                <th>FFA</th>
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
    var no = 1;
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

    function kedip_background(line, warna)
    {
      var no = 1;
      bg_shake = setInterval(function () {
          if (no%2 == 0) {
              $('#'+line).addClass(warna);
          }else{
              $('#'+line).removeClass(warna);
          }
          no++;
      }, 1000)
      setTimeout(function () {
          clearInterval(bg_shake);
      }, 300000)
    }
    get_minyak_bb("<?php echo $dept->name; ?>");

    $.ajax({
      url : "{{ URL::to('line/per_department') }}/<?php echo $dept->id; ?>",
      type : "GET",
      dataType : 'JSON',
      success : function (response)
      {
        var jumlah_line = response.length;
        if (response.length != 0) {
          var no = 0;
          $('#lines').html('');
          $.each(response, (index, item) => {
              no++;
              $('#lines').append(`
                  <tr class="line`+parseInt(index+1)+` line" id="`+item.id.replace(/ |:/gi,'-').toLowerCase()+`" style="display: none">
                    <td>`+item.id+`</td>
                    <td class="variant"></td>
                    <td class="sample_time"></td>
                    <td class="sample_create"></td>
                    <td class="fc"></td>
                    <td class="ka"></td>
                    <td class="pv">
                    <table class="table" style="margin: 0;text-align: center; border : 0px">
                      <tr>
                        <td style="border : 0px">8.00</td>
                      </tr>
                      <tr>
                        <td style="border : 0px">30% BB - 70% BK</td>
                      </tr>
                      <tr>
                        <td style="border : 0px">OK, sample ulang 1/2 jam</td>
                      </tr>
                    </table>
                    </td>
                    <td class="ffa">
                      <table class="table" style="margin: 0;text-align: center; border : 0px">
                        <tr>
                          <td style="border : 0px">8.00</td>
                        </tr>
                        <tr>
                          <td style="border : 0px">30% BB - 70% BK</td>
                        </tr>
                        <tr>
                          <td style="border : 0px">OK, sample ulang 1/2 jam</td>
                        </tr>
                      </table>
                    </td>
                  </tr>
              `);
          })
          var last = 1;
          setInterval( function () {
            $('.line').hide();
            for (var i = last; i <= last+4; i++) {
              $('.line'+i).show();
            }
            last = parseInt(last+5);
            if (last > jumlah_line) {
              last = 1;
            }
          }, 9000)
        }
      },
      error : function (error)
      {
          console.log(error)
      }
    })
    function get_minyak_result(dept, line) {
      // Untik minyak
      $.ajax({
          url: "{{ URL::to('display/minyak/get-last/') }}/MP/"+dept+"/"+line,
          type: "GET",
          dataType: "JSON",
          success: function (response) {
            if (response !== null) {
              $('#'+line.toLowerCase()+' .sample_time').text(response.sample_time.substr(0,5))
              $('#'+line.toLowerCase()+' .sample_create').text(response.input_time.substr(0,5))
              $('#'+line.toLowerCase()+' .variant').text(response.variant)
              $('#'+line.toLowerCase()+' .pv').text(response.nilai_pv.toFixed(2))
              $('#'+line.toLowerCase()+' .ffa').text(response.nilai_ffa.toFixed(4))
              if(response.sample_time.substr(0,5) != localStorage.getItem(line+'_jam_before'))
              {
                  if (response.jenis_variant == 'lokal')
                  {
                      if(response.nilai_pv < 2.50) {
                        $('#'+line.toLowerCase()+' .komposisi').html('-');
                        $('#'+line.toLowerCase()+' .disposisi').html('OK');
                        kedip_background(line.toLowerCase(), 'mark-green');
                      }
                      if(response.nilai_pv >= 2.50 && response.nilai_pv <= 3.00 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('-');
                        $('#'+line.toLowerCase()+' .disposisi').html('OK');
                        kedip_background(line.toLowerCase(), 'mark-green');
                      }
                      if(response.nilai_pv >= 3.00 && response.nilai_pv <= 3.50 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('20% BB - 80% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('OK');
                        kedip_background(line.toLowerCase(), 'mark-green');
                      }
                      if(response.nilai_pv >= 3.51 && response.nilai_pv <= 3.80 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('30% BB - 70% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('OK, sample ulang 1/2 jam');
                        kedip_background(line.toLowerCase(), 'mark-yellow');
                      }
                      if(response.nilai_pv >= 3.81 && response.nilai_pv <= 4.00 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('40% BB - 60% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Realase, Cut Proses, Komposisi');
                        kedip_background(line.toLowerCase(), 'mark-red');
                      }
                      if(response.nilai_pv >= 4.01 && response.nilai_pv <= 4.50 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('50% BB -  50% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Realase Pasar Tradisional');
                        kedip_background(line.toLowerCase(), 'mark-red');
                      }
                      if(response.nilai_pv >= 4.51 && response.nilai_pv <= 5.00 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('70% BB - 30% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Inkubasi 1 minggu');
                        kedip_background(line.toLowerCase(), 'mark-red');
                      }
                      if(response.nilai_pv > 5.00 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('100% BB - 0% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Repack Mie Eko');
                        kedip_background(line.toLowerCase(), 'mark-red');
                      }
                      // Untuk menampilkan komposisi FFA
                      if(response.nilai_ffa < 0.2000) {
                        $('#'+line.toLowerCase()+' .komposisi').html('-');
                        $('#'+line.toLowerCase()+' .disposisi').html('OK');
                      }
                      if(response.nilai_ffa >= 0.2000 && response.nilai_ffa <= 0.2350 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('30% BB - 70% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('OK');
                      }
                      if(response.nilai_ffa >= 0.2351 && response.nilai_ffa <= 2.500 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('40% BB - 60% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Realase, Cut Proses, Komposisi');
                      }
                      if(response.nilai_ffa >= 0.2501 && response.nilai_ffa <= 0.2750 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('50% BB - 50% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Inkubasi 1 minggu. Jika panel OK, Release Pasar Tradisional');
                      }
                      if(response.nilai_ffa >= 0.2751 && response.nilai_ffa <= 0.4000 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('70% BB -  30% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Inkubasi 1 minggu. Jika panel OK, Release Pasar Tradisional');
                      }
                      if(response.nilai_ffa > 0.4000 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('100% BB - 0% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Repack Mie Eko');
                      }
                  }
                  else if(response.jenis_variant == 'export')
                  {
                      /////// Ini untuk export
                      // Untuk menampilkan komposisi pv
                      if(response.nilai_pv < 3.00) {
                        $('#'+line.toLowerCase()+' .komposisi').html('-');
                        $('#'+line.toLowerCase()+' .disposisi').html('OK');
                        kedip_background(line.toLowerCase(), 'mark-green');
                      }
                      if(response.nilai_pv >= 3.00 && response.nilai_pv <= 3.30 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('20% BB - 80% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('OK');
                        kedip_background(line.toLowerCase(), 'mark-green');
                      }
                      if(response.nilai_pv >= 3.31 && response.nilai_pv <= 3.50 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('30% BB - 70% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('OK, sample ulang 1/2 jam');
                        kedip_background(line.toLowerCase(), 'mark-yellow');
                      }
                      if(response.nilai_pv >= 3.51 && response.nilai_pv <= 4.10 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('40% BB - 60% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Release, Cut Proses, Komposisi');
                        kedip_background(line.toLowerCase(), 'mark-red');
                      }
                      if(response.nilai_pv >= 4.11 && response.nilai_pv <= 4.50 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('50% BB - 50% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Repack & Release Pasar Tradisional');
                        kedip_background(line.toLowerCase(), 'mark-red');
                      }
                      if(response.nilai_pv >= 4.51 && response.nilai_pv <= 5.0 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('70% BB - 30% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Inkubasi 1 minggu & Repack Tradisional');
                        kedip_background(line.toLowerCase(), 'mark-red');
                      }
                      if(response.nilai_pv > 5.0 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('100% BB - 0% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Repack Mie Eko');
                        kedip_background(line.toLowerCase(), 'mark-red');
                      }
                      // Untuk menampilkan komposisi FFA
                      if(response.nilai_ffa < 0.2000) {
                        $('#'+line.toLowerCase()+' .komposisi').html('-');
                        $('#'+line.toLowerCase()+' .disposisi').html('OK');
                      }
                      if(response.nilai_ffa >= 0.2000 && response.nilai_ffa <= 0.2350 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('30% BB - 70% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('OK, sample ulang 1/2 jam');
                      }
                      if(response.nilai_ffa >= 0.2351 && response.nilai_ffa <= 0.2500 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('40% BB - 60% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Release, Cut Proses, Komposisi');
                      }
                      if(response.nilai_ffa >= 0.2501 && response.nilai_ffa <= 0.2750 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('50% BB - 50% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Inkubasi 1 minggu & Repack Tradisional');
                      }
                      if(response.nilai_ffa >= 0.2751 && response.nilai_ffa <= 0.4000 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('70% BB - 30% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Inkubasi 1 minggu & Repack Tradisional');
                      }
                      if(response.nilai_ffa > 0.4000 ) {
                        $('#'+line.toLowerCase()+' .komposisi').html('100% BB - 0% BK');
                        $('#'+line.toLowerCase()+' .disposisi').html('Repack Mie Eko');
                      }
                  }
                  localStorage.setItem(line+'_jam_before', response.sample_time.substr(0,5));
              }
            }
          },
          error: function (error) {
              console.log(error.response);
          }
      })
    }
    function get_mie_result(dept, line)
    {
      // Untuk mie
      $.ajax({
          url: "{{ URL::to('display/mie/get-last') }}/"+dept+"/"+line,
          type: "GET",
          dataType: "JSON",
          success: function (response) {
            if (response !== null) {
              $('#'+line.toLowerCase()+' .fc').text(response.nilai_fc.toFixed(4))
              $('#'+line.toLowerCase()+' .ka').text(response.nilai_ka.toFixed(4))
            }
          },
          error: function (error) {
              console.log(error.response);
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
              $('#'+line.toLowerCase()+' .komposisi').text('Waiting..')
              $('#'+line.toLowerCase()+' .disposisi').text('Waiting..')

          },
          error : function (error)
          {

          }
        })
    }

   </script>
<?php endif ?>
</body>
</html>