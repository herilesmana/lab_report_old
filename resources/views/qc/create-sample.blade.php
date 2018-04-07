@extends('layouts.base')

@section('title')
    Create Sample
@endsection

@section('breadcrumb')
  Create Sample
@endsection

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
          @if ($jenis == '')
              Create Sample ID
          @elseif ($jenis == 'minyak')
              <a class="btn btn-sm btn-primary text-white" href='{{ URL::to('home') }}'><i class="fa fa-arrow-left"></i> Kembali</a> Create Sample ID Minyak
          @elseif ($jenis == 'mie')
              <a class="btn btn-sm btn-primary text-white" href='{{ URL::to('home') }}'><i class="fa fa-arrow-left"></i> Kembali</a> Create Sample ID Mie
          @endif

  			</div>
  			<div class="card-body">
            @if ($jenis == '')
              <div class="container-fluid">
                  <a href='{{ URL::to('home') }}/minyak' style='height: 80px; margin: 2px;' class='btn btn-outline-info text-center'><i class="fa fa-tint fa-2x"></i><br><strong>Sample Minyak</strong></a>
                  <a href='{{ URL::to('home') }}/mie' style='height: 80px; margin: 2px;' class='btn btn-outline-info text-center'><i class="fa icon-layers fa-2x"></i><br><strong>Sample Mie</strong></a>
              </div>
            @elseif ($jenis == 'minyak')
              @include('qc.create-sample-minyak')
            @elseif ($jenis == 'mie')
              @include('qc.create-sample-mie')
            @endif
  			</div>
  		</div>
  	</div>
  </div>
@include('qc.confirm', ['variant_products' => $variant_products])
@endsection
@push('scripts')
<script type="text/javascript">
    var sekarang = "{{ date('d/m/Y') }}";
    $('#tanggal').val(sekarang);
    $('#tanggal_sample').datetimepicker({
        locale:'id',
        format: 'D/MM/Y'
    });
    $('#department').change(function () {
      $('#lines').html('')
        $('#jam_sample').val('');
    })
    $('#jam_sample').change(function () {
        get_lines();
    })

    function get_lines()
    {
      var dept_id = $('#department').val();
      if (dept_id == "") {
          alert('select department first');
          return false;
      }
      var jam_sample = $('#jam_sample').val();
      var tanggal_sample = $('#tanggal').val();
      function formatDate(date) {
          var d = new Date(date),
              month = '' + (d.getMonth() + 1),
              day = '' + d.getDate(),
              year = d.getFullYear();

          if (month.length < 2) month = '0' + month;
          if (day.length < 2) day = '0' + day;

          return [year,day,month].join('-');
      }
      $.ajax({
          url : "{{ URL::to('line') }}/"+dept_id+"/"+formatDate(tanggal_sample)+"/"+jam_sample+"/get",
          type: 'GET',
          dataType: 'JSON',
          success: (response) => {
              $('#lines').html(response.option)
          },
          error: (error) => {
              console.log(error)
          }
      })
    }

    function createSample(line)
    {
        $('#line').val(line);
        $('#confirm').modal('show');
    }

    $('#create_sample').submit( (event) => {
        event.preventDefault();
        var data_form = $('#create_sample').serializeArray();
        var department = $('#department').val();
        var tanggal_sample = $('#tanggal').val();
        var jam_sample = $('#jam_sample').val();
        var line = $('#line').val();
        data_form.push({
          name: "department",
          value: department
        });
        data_form.push({
          name: "tanggal_sample",
          value: tanggal_sample
        });
        data_form.push({
          name: "jam_sample",
          value: jam_sample
        });
        $.ajax({
            data : data_form,
            url: "{{ route('sample.minyak.create') }}",
            type: "POST",
            success: (response) => {
                if(response.success != 1) {
                    alert(response.error);
                }
                $('#confirm').modal('hide');
                $('#line').val('');
                get_lines();
            },
            error: (error) => {
                console.log(error)
            }
        });
    });

</script>
@endpush
