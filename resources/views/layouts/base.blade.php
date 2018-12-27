<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Lab Online App PT. PAS">
  <meta name="author" content="ITE PT.PAS">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ URL::asset('assets/img/favicon.png') }}">
  <title>Lab Online | @yield('title')</title>
  {{-- Style --}}
  <link href="{{ asset('assets/css/style2.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/tempusdominus-bootstrap-42.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/toastr2.min.css') }}" rel="stylesheet">
  <link href="https://cdn.datatables.net/fixedcolumns/3.2.5/css/fixedColumns.bootstrap4.min.css" rel="stylesheet">

  <!-- Styles required by this views -->
  <style type="text/css">
  @stack('styles')
  </style>

</head>

<body class="app aside-menu-fixed aside-menu-hidden sidebar-hidden">
 {{-- header --}}
 @include('layouts.header')

  <div class="app-body">
    {{-- sidebar --}}
    @include('layouts.sidebar')

    <!-- Main content -->
    <main class="main">

      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">@yield('breadcrumb')</li>
      </ol>

      <div class="container-fluid">

        <div class="animated fadeIn">
            @yield('content')
        </div>

      </div>
      <!-- /.conainer-fluid -->
    </main>


  </div>

  @include('layouts.footer')

  <script src="{{ URL::asset('assets/js/moment.min.js') }}"></script>
  <script type="text/javascript">
      moment.locale('id');
  </script>
  <script src="{{ URL::asset('assets/js/app.js') }}"></script>
  <script src="{{ URL::asset('assets/js/tempus.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="https://cdn.datatables.net/fixedcolumns/3.2.5/js/dataTables.fixedColumns.min.js"></script>
  <script src="{{ URL::asset('assets/js/toastr.min.js') }}"></script>
  <script type="text/javascript">
      function makeAlert(text1, text2, type = 'info', position="top-center", showMethod="slideDown")
      {
        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-"+position,
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": showMethod,
          "hideMethod": "fadeOut"
        }
        if (type == 'error') {
            toastr.error(text2,text1);
        }
        if (type == 'success') {
            toastr.success(text2,text1);
        }
        if (type == 'info') {
            toastr.info(text2,text1);
        }
      }
  </script>
  <!-- Custom scripts required by this view -->
  @stack('scripts')

  <script>
       window.Laravel = {!! json_encode([
           'csrfToken' => csrf_token(),
       ]) !!};
   </script>
</body>
</html>
