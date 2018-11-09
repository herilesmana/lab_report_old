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
      .pv-komposisi {
            font-weight: bold; font-size: 1.7em
      }
      .ffa-komposisi {
            font-weight: bold; font-size: 1.7em
      }
      .pv-disposisi {
            font-weight: bold; font-size: 0.9em
      }
      .ffa-disposisi {
            font-weight: bold; font-size: 0.9em
      }
      h2.judul {
        border-bottom: 1px solid #000
      }
  </style>

</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden sidebar-hidden" style="background: #fff">
<input type="hidden" id="background" value="#ffffff">
  <div class="container-fluid">
    <!-- Header -->
    <header style="background: #fff;box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12)" class="row">
        <nav class="navbar navbar-light col-md-2">
            <a href="#" class="navbar-brand">
                <img width="150px" src="{{ asset('images/logo.png') }}" alt="Display App">
            </a>
        </nav>
        <div style="padding: 5px" class="text-center title col-md-8">
            <h3>Real Time Lab Report</h3>
            <input type="hidden" id="dept" value="{{ $dept }}">
            <input type="hidden" id="line" value="{{ $line }}">
            <strong>
              <span class="dept">@if($dept != '') {{ $dept }} @else DEPT @endif</span> -
              <span class="line"> @if($line != '') {!! str_replace('-', ' ', $line) !!} @else LINE @endif</span> -
              <span class="variant-jalan"></span>
            </strong>
        </div>
        <div style="padding: 5px; padding-right: 15px" class="text-right col-md-2">
            <h4 class="time">00:00:00</h4>
            <span class="date">01 Januari 1000</span>
        </div>
    </header>
  </div>
  <div class="container-fluid row" style="flex-grow: 1; margin-top: 10px">
      <div class="col-sm-12">
        <!-- Sample Minyak -->
        <h2 class="col-sm-12 judul" >Sample Minyak</h2>
        <div id="sample-minyak" class="row">
            <div class="col-md-6 hasil-sample">
                <table style="background: #fff;border-radius: 5px;box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12)" class="table">
                    <thead>
                        <tr style="background: #bc0303; color: #fff" class="text-center">
                            <th class="text-center" rowspan="2" width="5px"><i class="fa fa-flask"></i></th>
                            <th rowspan="2">BB ( <span class="shift-pv-BB">S0</span> )</th>
                            <th rowspan="2">Proses ( <span class="jam-sample-pv-MP">00:00</span> )</th>
                            <th rowspan="2">Tangki A ( <span class="jam-sample-pv-BKA">00:00</span> )</th>
                            <th rowspan="2">Tangki B ( <span class="jam-sample-pv-BKB">00:00</span> )</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" style="font-weight: bold;">
                        <tr>
                            <th style="font-size: 1.7em">PV</th>
                            <td>
                                <span class="nilai-sample-pv-BB" style="font-size: 1.7em">0.00</span>
                            </td>
                            <td>
                                <span class="nilai-sample-pv-MP" style="font-size: 1.7em">0.00</span>
                            </td>
                            <td>
                                <span class="nilai-sample-pv-BKA" style="font-size: 1.7em">0.00</span>
                            </td>
                            <td>
                                <span class="nilai-sample-pv-BKB" style="font-size: 1.7em">0.00</span>
                            </td>
                        </tr>
                        <tr>
                            <th style="font-size: 1.7em">FFA</th>
                            <td>
                                <!-- <span class="jam-sample-ffa-MP">00:00</span> --> <span class="nilai-sample-ffa-BB" style="font-size: 1.7em">0.0000</span>
                            </td>
                            <td>
                                <!-- <span class="jam-sample-ffa-MP">00:00</span> --> <span class="nilai-sample-ffa-MP" style="font-size: 1.7em">0.0000</span>
                            </td>
                            <td>
                                <!-- <span class="jam-sample-ffa-BKA">00:00</span> --> <span class="nilai-sample-ffa-BKA" style="font-size: 1.7em">0.0000</span>
                            </td>
                            <td>
                                <!-- <span class="jam-sample-ffa-BKB">00:00</span> --> <span class="nilai-sample-ffa-BKB" style="font-size: 1.7em">0.0000</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 disposisi">
                <table style="background: #fff;border-radius: 5px;box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12)" class="table">
                    <thead>
                        <tr style="background: #bc0303; color: #fff" class="text-center">
                            <th rowspan="2" width="250">Komposisi</th>
                            <th rowspan="2">Dsiposisi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td class="pv-komposisi">
                                No Data
                            </td>
                            <td class="pv-disposisi">
                                No Data
                            </td>
                        </tr>
                        <tr>
                            <td class="ffa-komposisi">
                                No Data
                            </td>
                            <td class="ffa-disposisi">
                                No Data
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
      <div class="col-sm-4">
        <h2 class="col-sm-12 judul">Sample Mie</h2>
        <div id="sample-mie">
            <div class="hasil-sample">
                <table style="background: #fff;border-radius: 5px;box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12)" class="table">
                    <thead>
                        <tr style="background: #bc0303; color: #fff">
                            <th colspan="2">Shift : <span class="mie-shift"> ... </span>, Variant : <span class="mie-variant"> ... </span></th>
                        </tr>
                    </thead>
                    <tbody class="text-center" style="font-weight: bold">
                        <tr>
                            <td class="fc-result" class="col-md-6">
                                <h2 style="padding: 0">FC</h2>
                                <span style="font-size: 24px" class="mie-fc">
                                  <!-- Mulai spinner -->
                                  <strong class="default">-</strong>
                                  <div class="sampling" style="display: none">
                                    <svg class="lds-flask" height="60px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%;">
                                        <defs>
                                      <clipPath id="lds-flask-cpid-9c19a117499b1" clipPathUnits="userSpaceOnUse">
                                      <rect x="0" y="50" width="100" height="50"/>
                                      </clipPath>
                                      <pattern id="lds-flask-patid-36c8d7916e6fe" patternUnits="userSpaceOnUse" x="0" y="0" width="100" height="100">
                                      <rect x="0" y="0" width="100" height="100" fill="#cc232a"/><circle cx="53" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 147;0 -47" keyTimes="0;1" dur="3s" begin="-2.67s" repeatCount="indefinite"/>
                                      </circle><circle cx="61" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 137;0 -37" keyTimes="0;1" dur="3s" begin="-2.34s" repeatCount="indefinite"/>
                                      </circle><circle cx="92" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 144;0 -44" keyTimes="0;1" dur="3s" begin="-0.93s" repeatCount="indefinite"/>
                                      </circle><circle cx="23" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 108;0 -8" keyTimes="0;1" dur="3s" begin="-1.98s" repeatCount="indefinite"/>
                                      </circle><circle cx="76" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 139;0 -39" keyTimes="0;1" dur="3s" begin="-1.35s" repeatCount="indefinite"/>
                                      </circle><circle cx="20" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 129;0 -29" keyTimes="0;1" dur="3s" begin="-2.55s" repeatCount="indefinite"/>
                                      </circle><circle cx="77" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 141;0 -41" keyTimes="0;1" dur="3s" begin="-1.2s" repeatCount="indefinite"/>
                                      </circle><circle cx="1" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 112;0 -12" keyTimes="0;1" dur="3s" begin="-1.71s" repeatCount="indefinite"/>
                                      </circle><circle cx="79" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 115;0 -15" keyTimes="0;1" dur="3s" begin="-1.23s" repeatCount="indefinite"/>
                                      </circle><circle cx="12" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 144;0 -44" keyTimes="0;1" dur="3s" begin="-1.77s" repeatCount="indefinite"/>
                                      </circle><circle cx="96" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 148;0 -48" keyTimes="0;1" dur="3s" begin="-0.99s" repeatCount="indefinite"/>
                                      </circle><circle cx="3" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 134;0 -34" keyTimes="0;1" dur="3s" begin="-0.87s" repeatCount="indefinite"/>
                                      </circle><circle cx="95" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 130;0 -30" keyTimes="0;1" dur="3s" begin="-0.63s" repeatCount="indefinite"/>
                                      </circle><circle cx="73" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 106;0 -6" keyTimes="0;1" dur="3s" begin="-0.57s" repeatCount="indefinite"/>
                                      </circle><circle cx="54" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 136;0 -36" keyTimes="0;1" dur="3s" begin="-0.96s" repeatCount="indefinite"/>
                                      </circle><circle cx="96" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 121;0 -21" keyTimes="0;1" dur="3s" begin="-0.33s" repeatCount="indefinite"/>
                                      </circle><circle cx="30" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 103;0 -3" keyTimes="0;1" dur="3s" begin="-2.34s" repeatCount="indefinite"/>
                                      </circle><circle cx="56" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 139;0 -39" keyTimes="0;1" dur="3s" begin="-0.78s" repeatCount="indefinite"/>
                                      </circle><circle cx="57" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 149;0 -49" keyTimes="0;1" dur="3s" begin="-2.01s" repeatCount="indefinite"/>
                                      </circle><circle cx="24" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 137;0 -37" keyTimes="0;1" dur="3s" begin="-2.52s" repeatCount="indefinite"/>
                                      </circle><circle cx="79" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 149;0 -49" keyTimes="0;1" dur="3s" begin="-1.05s" repeatCount="indefinite"/>
                                      </circle><circle cx="5" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 123;0 -23" keyTimes="0;1" dur="3s" begin="-2.19s" repeatCount="indefinite"/>
                                      </circle><circle cx="92" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 135;0 -35" keyTimes="0;1" dur="3s" begin="-1.44s" repeatCount="indefinite"/>
                                      </circle><circle cx="94" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 120;0 -20" keyTimes="0;1" dur="3s" begin="-2.43s" repeatCount="indefinite"/>
                                      </circle><circle cx="87" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 143;0 -43" keyTimes="0;1" dur="3s" begin="-0.45s" repeatCount="indefinite"/>
                                      </circle><circle cx="36" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 143;0 -43" keyTimes="0;1" dur="3s" begin="-1.05s" repeatCount="indefinite"/>
                                      </circle><circle cx="7" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 134;0 -34" keyTimes="0;1" dur="3s" begin="-1.5s" repeatCount="indefinite"/>
                                      </circle><circle cx="61" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 111;0 -11" keyTimes="0;1" dur="3s" begin="-2.01s" repeatCount="indefinite"/>
                                      </circle><circle cx="8" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 108;0 -8" keyTimes="0;1" dur="3s" begin="-1.23s" repeatCount="indefinite"/>
                                      </circle><circle cx="8" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 148;0 -48" keyTimes="0;1" dur="3s" begin="-1.38s" repeatCount="indefinite"/>
                                      </circle><circle cx="13" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 151;0 -51" keyTimes="0;1" dur="3s" begin="-2.07s" repeatCount="indefinite"/>
                                      </circle><circle cx="91" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 146;0 -46" keyTimes="0;1" dur="3s" begin="-2.07s" repeatCount="indefinite"/>
                                      </circle><circle cx="38" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 115;0 -15" keyTimes="0;1" dur="3s" begin="-0.48s" repeatCount="indefinite"/>
                                      </circle><circle cx="5" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 148;0 -48" keyTimes="0;1" dur="3s" begin="-0.03s" repeatCount="indefinite"/>
                                      </circle><circle cx="71" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 136;0 -36" keyTimes="0;1" dur="3s" begin="-0.06s" repeatCount="indefinite"/>
                                      </circle><circle cx="53" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 145;0 -45" keyTimes="0;1" dur="3s" begin="-2.97s" repeatCount="indefinite"/>
                                      </circle><circle cx="90" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 112;0 -12" keyTimes="0;1" dur="3s" begin="-2.04s" repeatCount="indefinite"/>
                                      </circle><circle cx="67" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 151;0 -51" keyTimes="0;1" dur="3s" begin="-0.78s" repeatCount="indefinite"/>
                                      </circle><circle cx="1" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 119;0 -19" keyTimes="0;1" dur="3s" begin="-0.66s" repeatCount="indefinite"/>
                                      </circle><circle cx="58" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 133;0 -33" keyTimes="0;1" dur="3s" begin="-1.89s" repeatCount="indefinite"/>
                                      </circle><circle cx="17" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 145;0 -45" keyTimes="0;1" dur="3s" begin="-0.75s" repeatCount="indefinite"/>
                                      </circle><circle cx="14" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 141;0 -41" keyTimes="0;1" dur="3s" begin="-1.68s" repeatCount="indefinite"/>
                                      </circle><circle cx="22" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 111;0 -11" keyTimes="0;1" dur="3s" begin="-0.93s" repeatCount="indefinite"/>
                                      </circle><circle cx="91" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 134;0 -34" keyTimes="0;1" dur="3s" begin="-1.68s" repeatCount="indefinite"/>
                                      </circle><circle cx="93" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 133;0 -33" keyTimes="0;1" dur="3s" begin="-2.79s" repeatCount="indefinite"/>
                                      </circle><circle cx="57" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 106;0 -6" keyTimes="0;1" dur="3s" begin="-1.62s" repeatCount="indefinite"/>
                                      </circle><circle cx="47" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 122;0 -22" keyTimes="0;1" dur="3s" begin="-1.05s" repeatCount="indefinite"/>
                                      </circle><circle cx="85" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 102;0 -2" keyTimes="0;1" dur="3s" begin="-2.82s" repeatCount="indefinite"/>
                                      </circle><circle cx="27" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 120;0 -20" keyTimes="0;1" dur="3s" begin="-2.4s" repeatCount="indefinite"/>
                                      </circle><circle cx="79" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 132;0 -32" keyTimes="0;1" dur="3s" begin="-1.77s" repeatCount="indefinite"/>
                                      </circle>      </pattern></defs>

                                            <path fill="url(#lds-flask-patid-36c8d7916e6fe)" clip-path="url(#lds-flask-cpid-9c19a117499b1)" d="M59,37.3V18.9c3-0.8,5.1-3.6,5.1-6.8C64.1,8.2,61,5,57.1,5H42.9c-3.9,0-7.1,3.2-7.1,7.1c0,3.2,2.2,6,5.1,6.8v18.4c-11.9,3.8-20.6,15-20.6,28.2C20.4,81.8,33.7,95,50,95s29.6-13.2,29.6-29.6C79.6,52.2,70.9,41.1,59,37.3z"/>

                                            <path fill="none" stroke="#3d3d3d" stroke-width="5" d="M59,37.3V18.9c3-0.8,5.1-3.6,5.1-6.8C64.1,8.2,61,5,57.1,5H42.9c-3.9,0-7.1,3.2-7.1,7.1c0,3.2,2.2,6,5.1,6.8v18.4c-11.9,3.8-20.6,15-20.6,28.2C20.4,81.8,33.7,95,50,95s29.6-13.2,29.6-29.6C79.6,52.2,70.9,41.1,59,37.3z"/>
                                    </svg>
                                  </div>
                                  <!-- Selesai spinner -->
                                </span>
                            </td>
                            <td class="ka-result" class="col-md-6">
                                <h2>KA</h2>
                                <span style="font-size: 24px" class="mie-ka">
                                  <!-- Mulai spinner -->
                                  <strong class="default">-</strong>
                                  <div class="sampling" style="display: none">
                                    <svg class="lds-flask" height="60px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%;">
                                        <defs>
                                      <clipPath id="lds-flask-cpid-9c19a117499b1" clipPathUnits="userSpaceOnUse">
                                      <rect x="0" y="50" width="100" height="50"/>
                                      </clipPath>
                                      <pattern id="lds-flask-patid-36c8d7916e6fe" patternUnits="userSpaceOnUse" x="0" y="0" width="100" height="100">
                                      <rect x="0" y="0" width="100" height="100" fill="#cc232a"/><circle cx="53" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 147;0 -47" keyTimes="0;1" dur="3s" begin="-2.67s" repeatCount="indefinite"/>
                                      </circle><circle cx="61" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 137;0 -37" keyTimes="0;1" dur="3s" begin="-2.34s" repeatCount="indefinite"/>
                                      </circle><circle cx="92" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 144;0 -44" keyTimes="0;1" dur="3s" begin="-0.93s" repeatCount="indefinite"/>
                                      </circle><circle cx="23" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 108;0 -8" keyTimes="0;1" dur="3s" begin="-1.98s" repeatCount="indefinite"/>
                                      </circle><circle cx="76" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 139;0 -39" keyTimes="0;1" dur="3s" begin="-1.35s" repeatCount="indefinite"/>
                                      </circle><circle cx="20" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 129;0 -29" keyTimes="0;1" dur="3s" begin="-2.55s" repeatCount="indefinite"/>
                                      </circle><circle cx="77" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 141;0 -41" keyTimes="0;1" dur="3s" begin="-1.2s" repeatCount="indefinite"/>
                                      </circle><circle cx="1" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 112;0 -12" keyTimes="0;1" dur="3s" begin="-1.71s" repeatCount="indefinite"/>
                                      </circle><circle cx="79" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 115;0 -15" keyTimes="0;1" dur="3s" begin="-1.23s" repeatCount="indefinite"/>
                                      </circle><circle cx="12" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 144;0 -44" keyTimes="0;1" dur="3s" begin="-1.77s" repeatCount="indefinite"/>
                                      </circle><circle cx="96" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 148;0 -48" keyTimes="0;1" dur="3s" begin="-0.99s" repeatCount="indefinite"/>
                                      </circle><circle cx="3" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 134;0 -34" keyTimes="0;1" dur="3s" begin="-0.87s" repeatCount="indefinite"/>
                                      </circle><circle cx="95" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 130;0 -30" keyTimes="0;1" dur="3s" begin="-0.63s" repeatCount="indefinite"/>
                                      </circle><circle cx="73" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 106;0 -6" keyTimes="0;1" dur="3s" begin="-0.57s" repeatCount="indefinite"/>
                                      </circle><circle cx="54" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 136;0 -36" keyTimes="0;1" dur="3s" begin="-0.96s" repeatCount="indefinite"/>
                                      </circle><circle cx="96" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 121;0 -21" keyTimes="0;1" dur="3s" begin="-0.33s" repeatCount="indefinite"/>
                                      </circle><circle cx="30" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 103;0 -3" keyTimes="0;1" dur="3s" begin="-2.34s" repeatCount="indefinite"/>
                                      </circle><circle cx="56" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 139;0 -39" keyTimes="0;1" dur="3s" begin="-0.78s" repeatCount="indefinite"/>
                                      </circle><circle cx="57" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 149;0 -49" keyTimes="0;1" dur="3s" begin="-2.01s" repeatCount="indefinite"/>
                                      </circle><circle cx="24" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 137;0 -37" keyTimes="0;1" dur="3s" begin="-2.52s" repeatCount="indefinite"/>
                                      </circle><circle cx="79" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 149;0 -49" keyTimes="0;1" dur="3s" begin="-1.05s" repeatCount="indefinite"/>
                                      </circle><circle cx="5" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 123;0 -23" keyTimes="0;1" dur="3s" begin="-2.19s" repeatCount="indefinite"/>
                                      </circle><circle cx="92" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 135;0 -35" keyTimes="0;1" dur="3s" begin="-1.44s" repeatCount="indefinite"/>
                                      </circle><circle cx="94" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 120;0 -20" keyTimes="0;1" dur="3s" begin="-2.43s" repeatCount="indefinite"/>
                                      </circle><circle cx="87" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 143;0 -43" keyTimes="0;1" dur="3s" begin="-0.45s" repeatCount="indefinite"/>
                                      </circle><circle cx="36" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 143;0 -43" keyTimes="0;1" dur="3s" begin="-1.05s" repeatCount="indefinite"/>
                                      </circle><circle cx="7" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 134;0 -34" keyTimes="0;1" dur="3s" begin="-1.5s" repeatCount="indefinite"/>
                                      </circle><circle cx="61" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 111;0 -11" keyTimes="0;1" dur="3s" begin="-2.01s" repeatCount="indefinite"/>
                                      </circle><circle cx="8" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 108;0 -8" keyTimes="0;1" dur="3s" begin="-1.23s" repeatCount="indefinite"/>
                                      </circle><circle cx="8" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 148;0 -48" keyTimes="0;1" dur="3s" begin="-1.38s" repeatCount="indefinite"/>
                                      </circle><circle cx="13" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 151;0 -51" keyTimes="0;1" dur="3s" begin="-2.07s" repeatCount="indefinite"/>
                                      </circle><circle cx="91" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 146;0 -46" keyTimes="0;1" dur="3s" begin="-2.07s" repeatCount="indefinite"/>
                                      </circle><circle cx="38" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 115;0 -15" keyTimes="0;1" dur="3s" begin="-0.48s" repeatCount="indefinite"/>
                                      </circle><circle cx="5" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 148;0 -48" keyTimes="0;1" dur="3s" begin="-0.03s" repeatCount="indefinite"/>
                                      </circle><circle cx="71" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 136;0 -36" keyTimes="0;1" dur="3s" begin="-0.06s" repeatCount="indefinite"/>
                                      </circle><circle cx="53" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 145;0 -45" keyTimes="0;1" dur="3s" begin="-2.97s" repeatCount="indefinite"/>
                                      </circle><circle cx="90" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 112;0 -12" keyTimes="0;1" dur="3s" begin="-2.04s" repeatCount="indefinite"/>
                                      </circle><circle cx="67" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 151;0 -51" keyTimes="0;1" dur="3s" begin="-0.78s" repeatCount="indefinite"/>
                                      </circle><circle cx="1" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 119;0 -19" keyTimes="0;1" dur="3s" begin="-0.66s" repeatCount="indefinite"/>
                                      </circle><circle cx="58" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 133;0 -33" keyTimes="0;1" dur="3s" begin="-1.89s" repeatCount="indefinite"/>
                                      </circle><circle cx="17" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 145;0 -45" keyTimes="0;1" dur="3s" begin="-0.75s" repeatCount="indefinite"/>
                                      </circle><circle cx="14" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 141;0 -41" keyTimes="0;1" dur="3s" begin="-1.68s" repeatCount="indefinite"/>
                                      </circle><circle cx="22" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 111;0 -11" keyTimes="0;1" dur="3s" begin="-0.93s" repeatCount="indefinite"/>
                                      </circle><circle cx="91" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 134;0 -34" keyTimes="0;1" dur="3s" begin="-1.68s" repeatCount="indefinite"/>
                                      </circle><circle cx="93" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 133;0 -33" keyTimes="0;1" dur="3s" begin="-2.79s" repeatCount="indefinite"/>
                                      </circle><circle cx="57" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 106;0 -6" keyTimes="0;1" dur="3s" begin="-1.62s" repeatCount="indefinite"/>
                                      </circle><circle cx="47" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 122;0 -22" keyTimes="0;1" dur="3s" begin="-1.05s" repeatCount="indefinite"/>
                                      </circle><circle cx="85" cy="0" r="2" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 102;0 -2" keyTimes="0;1" dur="3s" begin="-2.82s" repeatCount="indefinite"/>
                                      </circle><circle cx="27" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 120;0 -20" keyTimes="0;1" dur="3s" begin="-2.4s" repeatCount="indefinite"/>
                                      </circle><circle cx="79" cy="0" r="3" fill="#ffffff">
                                      <animateTransform attributeName="transform" type="translate" values="0 132;0 -32" keyTimes="0;1" dur="3s" begin="-1.77s" repeatCount="indefinite"/>
                                      </circle>      </pattern></defs>

                                            <path fill="url(#lds-flask-patid-36c8d7916e6fe)" clip-path="url(#lds-flask-cpid-9c19a117499b1)" d="M59,37.3V18.9c3-0.8,5.1-3.6,5.1-6.8C64.1,8.2,61,5,57.1,5H42.9c-3.9,0-7.1,3.2-7.1,7.1c0,3.2,2.2,6,5.1,6.8v18.4c-11.9,3.8-20.6,15-20.6,28.2C20.4,81.8,33.7,95,50,95s29.6-13.2,29.6-29.6C79.6,52.2,70.9,41.1,59,37.3z"/>

                                            <path fill="none" stroke="#3d3d3d" stroke-width="5" d="M59,37.3V18.9c3-0.8,5.1-3.6,5.1-6.8C64.1,8.2,61,5,57.1,5H42.9c-3.9,0-7.1,3.2-7.1,7.1c0,3.2,2.2,6,5.1,6.8v18.4c-11.9,3.8-20.6,15-20.6,28.2C20.4,81.8,33.7,95,50,95s29.6-13.2,29.6-29.6C79.6,52.2,70.9,41.1,59,37.3z"/>
                                    </svg>
                                  </div>
                                  <!-- Selesai spinner -->
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="row">
            <h2 class="col-sm-12 judul">History</h2>
            <div class="history col-sm-6">
                <table style="background: #fff;border-radius: 5px;box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12)" class="table">
                    <thead>
                        <tr style="background: #bc0303; color: #fff" class="text-center">
                            <th><i class="fa fa-clock-o"></i> Shift</th>
                            <th>FC</th>
                            <th>KA</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="history-mie" style="font-weight: bold">
                        <tr>
                            <td colspan="4">No Data..</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="history col-sm-6">
                <table style="background: #fff;border-radius: 5px;box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12)" class="table">
                    <thead>
                        <tr style="background: #bc0303; color: #fff" class="text-center">
                            <th><i class="fa fa-clock-o"></i> Sample</th>
                            <th><i class="fa fa-clock-o"></i> Create</th>
                            <th>PV</th>
                            <th>FFA</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" style="font-weight: bold" id="history-minyak">
                        <tr>
                            <td colspan="4">No Data...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
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
           return "0"+time;
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
     }, 1000)

    function kedip_background()
    {
        var bg_shake = setInterval(function() {
          if (no%2 == 0) {
              $('body').attr('style', 'background:'+$('#background').val());
          }else{
              $('body').attr('style', 'background: #fff');
          }
          no++;
        }, 1000)

        setTimeout(function () {
            clearInterval(bg_shake);
            $('body').attr('style', 'background: #fff');
        }, 300000)
    }

    // History 5 sample minyak
    function get_history_minyak()
    {
        $.ajax({
          url : "{{ URL::to('display/minyak/get-history') }}/"+$('#dept').val()+"/"+$('#line').val(),
          type : "GET",
          dataType : 'JSON',
          success : function (response)
          {
            if (response.length != 0) {
              var no = 0;
              $('#history-minyak').html('');
              $.each(response, (index, item) => {
                  var sample_time = item.sample_time;
                  var nilai_pv = item.nilai_pv;
                  var nilai_ffa = item.nilai_ffa;
                  if (item.ulang == 'Y') {
                      sample_time = '';
                  }
                  no++;
                  $('#history-minyak').append(`
                      <tr>
                          <td>`+sample_time+`</td>
                          <td>`+item.input_time+`</td>
                          <td>`+nilai_pv.toFixed(2)+`</td>
                          <td>`+nilai_ffa.toFixed(4)+`</td>
                      </tr>
                  `);
              })
            }
          },
          error : function (error)
          {

          }
        })
    }

    // History 5 sample mie
    function get_history_mie()
    {
        $.ajax({
          url : "{{ URL::to('display/mie/get-history') }}/"+$('#dept').val()+"/"+$('#line').val(),
          type : "GET",
          dataType : 'JSON',
          success : function (response)
          {
            if (response.length != 0) {
              var no = 0;
              $('#history-mie').html('');
              $.each(response, (index, item) => {
                  no++;
                  var nilai_fc = item.nilai_fc;
                  var nilai_ka = item.nilai_ka;
                  if (item.nilai_fc == 0 ) {
                    nilai_fc = "-";
                  }
                  if (item.nilai_ka == 0) {
                    nilai_ka == "-";
                  }
                  $('#history-mie').append(`
                      <tr>
                          <td>`+item.shift+`</td>
                          <td>`+nilai_fc.toFixed(2)+`</td>
                          <td>`+nilai_ka.toFixed(2)+`</td>
                      </tr>
                  `);
              })
            }
          },
          error : function (error)
          {

          }
        })
    }

    function get_sample_mie_result_ka()
    {
        $.ajax({
          url : "{{ URL::to('display/mie/get-result-ka') }}/"+$('#dept').val()+"/"+$('#line').val(),
          type : "GET",
          dataType : 'JSON',
          success : function (response)
          {
            console.log('response ka '+JSON.stringify(response))
            if (response != null) {
              if (response.status == 1 || response.status == 2 && response.approve != "Y") {
                $('.mie-ka .default').attr('style', 'display:none');
                $('.mie-ka .sampling').attr('style', 'display:block');
              }else if ( response.approve == "Y" ) {
                $('.mie-ka .default').attr('style', 'display:block');
                $('.mie-ka .sampling').attr('style', 'display:none');
              }
              $('.mie-shift').html(response.shift);
              $('.mie-variant').html(response.variant);
              $('.mie-ka .default').html(response.nilai_ka);
              if (response.nilai_ka > 3) {
                $('.mie-ka .default').addClass('text-red');
              }else{
                $('.mie-ka .default').removeClass('text-red');
              }
            }
          },
          error : function (error)
          {

          }
        })
    }
    function get_sample_mie_result_fc()
    {
        $.ajax({
          url : "{{ URL::to('display/mie/get-result-fc') }}/"+$('#dept').val()+"/"+$('#line').val(),
          type : "GET",
          dataType : 'JSON',
          success : function (response)
          {
            console.log('response fc '+JSON.stringify(response))
            if (response != null) {
              if (response.status == 1 || response.status == 2) {
                $('.mie-fc .default').attr('style', 'display:none');
                $('.mie-fc .sampling').attr('style', 'display:block');
              }else if (response.approve_fc == "Y") {
                $('.mie-fc .default').attr('style', 'display:block');
                $('.mie-fc .sampling').attr('style', 'display:none');
              }
              $('.mie-fc .default').html(response.nilai_fc);
            }
          },
          error : function (error)
          {

          }
        })
    }

    function get_minyak_bb()
    {
        $.ajax({
          url : "{{ URL::to('display/minyak/get-bb') }}/"+$('#dept').val(),
          type : "GET",
          dataType : 'JSON',
          success : function (response)
          {
            if (response != null) {
              $('.nilai-sample-pv-BB').html(response.nilai_pv);
              $('.nilai-sample-ffa-BB').html(response.nilai_ffa);
              $('.shift-pv-BB').html(response.shift);
            }
          },
          error : function (error)
          {

          }
        })
    }


    function get_sample_result(tangki) {
         $.ajax({
            url: "{{ URL::to('display/minyak/get-last/') }}/"+tangki+"/"+$('#dept').val()+"/"+$('#line').val(),
            type: "GET",
            dataType: "JSON",
            success: function (response) {
              if (response !== null) {
                $('.variant-jalan').text(response.variant)
                $('.jam-sample-pv-'+tangki).text(response.sample_time.substr(0,5))
                $('.nilai-sample-pv-'+tangki).text(response.nilai_pv.toFixed(2))
                $('.jam-sample-ffa-'+tangki).text(response.sample_time.substr(0,5))
                $('.nilai-sample-ffa-'+tangki).text(response.nilai_ffa.toFixed(4))
                if (tangki == 'MP') {
                    /////// Ini untuk Local
                    if(response.sample_time.substr(0,5) != localStorage.getItem('jam_before'))
                    {
                        if (response.jenis_variant == 'lokal')
                        {
                            // Untuk membuat background kedap kedip berdasarkan nilai PV dan FFA
                            if( response.nilai_pv < 2.50 &&     ( response.nilai_pv >= 2.50 && response.nilai_pv <= 3.00 ) &&   ( response.nilai_pv >= 3.00 && response.nilai_pv <= 3.50 ) &&     (response.nilai_ffa < 0.2000) &&    (response.nilai_ffa >= 0.2000 && response.nilai_ffa <= 0.2350 )  )
                            {
                                // Background warna hijau
                                $('#background').val('#4dbd74');
                                kedip_background();
                            }
                            else if( (response.nilai_pv >= 3.51 && response.nilai_pv <= 3.80 ) )
                            {
                                // Background warna kuning
                                $('#background').val('#ffc107');
                                kedip_background();
                            }
                            else if( (response.nilai_pv >= 3.81 && response.nilai_pv <= 4.00 ) || (response.nilai_pv >= 4.01 && response.nilai_pv <= 4.50 ) || (response.nilai_pv >= 4.51 && response.nilai_pv <= 5.00 ) || (response.nilai_pv > 5.00 ) || (response.nilai_ffa >= 0.2351 && response.nilai_ffa <= 2.500 ) || (response.nilai_ffa >= 0.2501 && response.nilai_ffa <= 0.2750 ) || (response.nilai_ffa >= 0.2751 && response.nilai_ffa <= 0.4000 ) || (response.nilai_ffa > 0.4000 ))
                            {
                                // Background warna merah
                                $('#background').val('#f86c6b');
                                kedip_background();
                            }
                            else
                            {
                                // Background warna putih
                                $('#background').val('#ffffff');
                                kedip_background();
                            }

                            if(response.nilai_pv < 2.50) {
                              $('.pv-komposisi').html('-');
                              $('.pv-disposisi').html('OK');
                            }
                            if( response.nilai_pv >= 2.50 && response.nilai_pv <= 3.00 ) {
                              $('.pv-komposisi').html('-');
                              $('.pv-disposisi').html('OK');
                            }
                            if( response.nilai_pv >= 3.00 && response.nilai_pv <= 3.50 ) {
                              $('.pv-komposisi').html('20% BB - 80% BK');
                              $('.pv-disposisi').html('OK');
                            }
                            if(response.nilai_pv >= 3.51 && response.nilai_pv <= 3.80 ) {
                              $('.pv-komposisi').html('30% BB - 70% BK');
                              $('.pv-disposisi').html('OK, sample ulang 1/2 jam');
                            }
                            if(response.nilai_pv >= 3.81 && response.nilai_pv <= 4.00 ) {
                              $('.pv-komposisi').html('40% BB <br>60% BK');
                              $('.pv-disposisi').html('Realase, Cut Proses, Komposisi');
                            }
                            if(response.nilai_pv >= 4.01 && response.nilai_pv <= 4.50 ) {
                              $('.pv-komposisi').html('50% BB -  50% BK');
                              $('.pv-disposisi').html('Realase Pasar Tradisional');
                            }
                            if(response.nilai_pv >= 4.51 && response.nilai_pv <= 5.00 ) {
                              $('.pv-komposisi').html('70% BB - 30% BK');
                              $('.pv-disposisi').html('Inkubasi 1 minggu');
                            }
                            if(response.nilai_pv > 5.00 ) {
                              $('.pv-komposisi').html('100% BB <br>0% BK');
                              $('.pv-disposisi').html('Repack Mie Eko');
                            }
                            // Untuk menampilkan komposisi FFA
                            if(response.nilai_ffa < 0.2000) {
                              $('.ffa-komposisi').html('-');
                              $('.ffa-disposisi').html('OK');
                            }
                            if(response.nilai_ffa >= 0.2000 && response.nilai_ffa <= 0.2350 ) {
                              $('.ffa-komposisi').html('30% BB - 70% BK');
                              $('.ffa-disposisi').html('OK');
                            }
                            if(response.nilai_ffa >= 0.2351 && response.nilai_ffa <= 2.500 ) {
                              $('.ffa-komposisi').html('40% BB - 60% BK');
                              $('.ffa-disposisi').html('Realase, Cut Proses, Komposisi');
                            }
                            if(response.nilai_ffa >= 0.2501 && response.nilai_ffa <= 0.2750 ) {
                              $('.ffa-komposisi').html('50% BB - 50% BK');
                              $('.ffa-disposisi').html('Inkubasi 1 minggu. Jika panel OK, Release Pasar Tradisional');
                            }
                            if(response.nilai_ffa >= 0.2751 && response.nilai_ffa <= 0.4000 ) {
                              $('.ffa-komposisi').html('70% BB -  30% BK');
                              $('.ffa-disposisi').html('Inkubasi 1 minggu. Jika panel OK, Release Pasar Tradisional');
                            }
                            if(response.nilai_ffa > 0.4000 ) {
                              $('.ffa-komposisi').html('100% BB - 0% BK');
                              $('.ffa-disposisi').html('Repack Mie Eko');
                            }
                        }
                        else if(response.jenis_variant == 'export')
                        {
                            /////// Ini untuk export
                            // Untuk menampilkan komposisi pv
                            if(response.nilai_pv < 3.00) {
                              $('.pv-komposisi').html('-');
                              $('.pv-disposisi').html('OK');
                              $('#background').val('#4dbd74');
                            }
                            if(response.nilai_pv >= 3.00 && response.nilai_pv <= 3.30 ) {
                              $('.pv-komposisi').html('20% BB - 80% BK');
                              $('.pv-disposisi').html('OK');
                              $('#background').val('#4dbd74');
                            }
                            if(response.nilai_pv >= 3.31 && response.nilai_pv <= 3.50 ) {
                              $('.pv-komposisi').html('30% BB - 70% BK');
                              $('.pv-disposisi').html('OK, sample ulang 1/2 jam');
                              $('#background').val('#ffc107');
                            }
                            if(response.nilai_pv >= 3.51 && response.nilai_pv <= 4.10 ) {
                              $('.pv-komposisi').html('40% BB - 60% BK');
                              $('.pv-disposisi').html('Release, Cut Proses, Komposisi');
                              $('#background').val('#f86c6b');
                            }
                            if(response.nilai_pv >= 4.11 && response.nilai_pv <= 4.50 ) {
                              $('.pv-komposisi').html('50% BB - 50% BK');
                              $('.pv-disposisi').html('Repack & Release Pasar Tradisional');
                              $('#background').val('#f86c6b');
                            }
                            if(response.nilai_pv >= 4.51 && response.nilai_pv <= 5.0 ) {
                              $('.pv-komposisi').html('70% BB - 30% BK');
                              $('.pv-disposisi').html('Inkubasi 1 minggu & Repack Tradisional');
                              $('#background').val('#f86c6b');
                            }
                            if(response.nilai_pv > 5.0 ) {
                              $('.pv-komposisi').html('100% BB - 0% BK');
                              $('.pv-disposisi').html('Repack Mie Eko');
                              $('#background').val('#f86c6b');
                            }
                            // Untuk menampilkan komposisi FFA
                            if(response.nilai_ffa < 0.2000) {
                              $('.ffa-komposisi').html('-');
                              $('.ffa-disposisi').html('OK');
                            }
                            if(response.nilai_ffa >= 0.2000 && response.nilai_ffa <= 0.2350 ) {
                              $('.ffa-komposisi').html('30% BB - 70% BK');
                              $('.ffa-disposisi').html('OK, sample ulang 1/2 jam');
                            }
                            if(response.nilai_ffa >= 0.2351 && response.nilai_ffa <= 0.2500 ) {
                              $('.ffa-komposisi').html('40% BB - 60% BK');
                              $('.ffa-disposisi').html('Release, Cut Proses, Komposisi');
                            }
                            if(response.nilai_ffa >= 0.2501 && response.nilai_ffa <= 0.2750 ) {
                              $('.ffa-komposisi').html('50% BB - 50% BK');
                              $('.ffa-disposisi').html('Inkubasi 1 minggu & Repack Tradisional');
                            }
                            if(response.nilai_ffa >= 0.2751 && response.nilai_ffa <= 0.4000 ) {
                              $('.ffa-komposisi').html('70% BB - 30% BK');
                              $('.ffa-disposisi').html('Inkubasi 1 minggu & Repack Tradisional');
                            }
                            if(response.nilai_ffa > 0.4000 ) {
                              $('.ffa-komposisi').html('100% BB - 0% BK');
                              $('.ffa-disposisi').html('Repack Mie Eko');
                            }
                        }
                        localStorage.setItem('jam_before', response.sample_time.substr(0,5));
                    }


                }
              }
            },
            error: function (error) {

            }
         })
     }
   if ($('#dept').val() != '' && $('#line').val() != '') {
        localStorage.setItem('jam_before', '');
        // Data refresh setiap 10 detik
        setInterval(function() {
            // Untuk mendapatkan nilai sample minyak terakhir
            get_sample_result('MP')
            get_sample_result('BKA')
            get_sample_result('BKB')
            // Untuk mendapatkan nilai history minyak
            get_history_minyak();
            // Untuk mendapatkan nilai history mie
            get_history_mie();
            // Untuk mendapatkan nilai sample mie terakhir
            get_sample_mie_result_fc();
            get_sample_mie_result_ka();
            // Untuk mendapatkan nilai BB
            get_minyak_bb()
        }, 10000);
        // Untuk menampilkan data sebelum sepuluh detik
        // Untuk mendapatkan nilai sample minyak terakhir
        get_sample_result('MP')
        get_sample_result('BKA')
        get_sample_result('BKB')
        // Untuk mendapatkan nilai history minyak
        get_history_minyak();
        // Untuk mendapatkan nilai history mie
        get_history_mie();
        // Untuk mendapatkan nilai sample mie terakhir
        get_sample_mie_result_fc();
        get_sample_mie_result_ka();
        // Untuk mendapatkan nilai BB
        get_minyak_bb()
    }

   </script>
</body>
</html>
