@extends('layouts.base')

@section('title')
    Shift Plan
@endsection

@section('breadcrumb')
  Shift
@endsection

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
  				Master Shift Plan
  			</div>
  			<div class="card-body">
  				<div class="container-fluid">
            <div class="form-group row">
                <div id="department" class="col-md-2">
                  <select class="form-control">
                    <option value="null">Pilih Department</option>
                    @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div id="tanggal_awal" class="col-md-3 input-group date" data-target-input="nearest">
                    <input name="tanggal_awal" placeholder="Tanggal Awal" class="form-control datetimepicker-input" type="text" data-target="#tanggal_awal" id="awal">
                    <div class="input-group-append" data-target="#tanggal_awal" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <span class="invalid-feedback"></span>
                </div>
                <div id="tanggal_akhir" class="col-md-3 input-group date" data-target-input="nearest">
                    <input name="tanggal_akhir" placeholder="Tanggal Akhir" class="form-control datetimepicker-input" type="text" data-target="#tanggal_akhir" id="akhir">
                    <div class="input-group-append" data-target="#tanggal_akhir" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <span class="invalid-feedback"></span>
                </div>
                <div class="col-md-4">
                  <button id="get" type="button" name="get" class="get btn btn-danger">Get</button>
                  <button id="set" type="button" name="set" class="btn btn-danger">Set</button>
                </div>
            </div>
            <form name="shiftForm" id="shiftForm" enctype="multipart/form-data">
              <div class="form-group row">
                  <div class="shift col-md-12">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Date</th>
                          <th>Day</th>
                          <th>Shift</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                        <tbody class="shifts">
                        </tbody>
                    </table>
                  </div>
              </div>
            </form>
          </div>
  			</div>
  		</div>
  	</div>
  </div>
  @include('shift.form')
@endsection

@push('scripts')
<script type="text/javascript">
var table, save_method;
$(function() {
  $('#tanggal_awal').datetimepicker({
      locale:'id',
      format: 'Y-MM-D'
  });

  $('#tanggal_akhir').datetimepicker({
      locale: 'id',
      format: 'Y-MM-D'
  });
  var now = "{{ date('Y-m-d') }}";
  $('#awal').val(now);
  $('#akhir').val(now);

  function getDates (startDate, endDate) {
    var dates = [],
        currentDate = startDate,
        addDays = function(days) {
          var date = new Date(this.valueOf());
          date.setDate(date.getDate() + days);
          return date;
        };
    while (currentDate <= endDate) {
      dates.push(currentDate);
      currentDate = addDays.call(currentDate, 1);
    }
    return dates;
  };
  function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
  }
  function getHari(date)
  {
    var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];
    return hari[date.getDay()];
  }
  function get_shifts()
  {
    if ($('#department select').val() ==  "null") {
      alert('Pilih department terlebih dahulu');
      return false;
    }
    $('#get').attr('disabled', true);
    $('#get').html('<i class="fa fa-spin fa-spinner"></i> Geting...');
    $.ajax({
        url : "{{ URL::to('t-shift/get-shift') }}/"+$('#department select').val()+"/"+$('#awal').val()+"/"+$('#akhir').val(),
        dataType: 'JSON',
        success : function (data) {
            $('.shifts').html('');
            var range_tanggal = [];
            var tanggal = '';
            var label = '';
            var status = '';
            var array_shift = [];
            var array_id = [];
            var no = 1;
            var id = '';
            data.forEach(function (shift, idx, array) {
              range_tanggal.push(shift.date);
              array_shift.push(shift.shift);
              array_id.push(shift.id);
              if (idx === array.length - 1){ 
                var dates = getDates( new Date( $('#awal').val() ), new Date( $('#akhir').val() ) );
                dates.forEach(function(date) {
                  var sekarang = formatDate(date);
                  var hari = getHari(date);
                  if (hari == 'Minggu') {
                    var libur = 'text-red';
                  }else{
                    var libur = '';
                  }
                  if (range_tanggal.includes(sekarang)) {
                    id = array_id[range_tanggal.indexOf(sekarang)]; 
                    label = `<span class="badge badge-success">Seted</span>`;
                    if (array_shift[range_tanggal.indexOf(sekarang)] == 'SS') {
                      status = 'checked';
                    }else{
                      status = '';
                    }
                  }else{
                    id = '';
                    label = `<span class="badge badge-secondary">Not set yet</span>`;
                    status = '';
                  }
                  $('.shifts').append(`
                      <tr class='`+libur+`'>
                        <input class="row" name="row" type="hidden" value="`+no+`" />
                        <input name="tanggal`+no+`" type="hidden" value="`+sekarang+`" />
                        <input name="id`+no+`" type="hidden" value="`+id+`" />
                        <td>`+no+`</td>
                        <td>`+sekarang+`</td>
                        <td>`+hari+`</td>
                        <td>
                          <label class="switch switch-label switch-secondary">
                            <input name="shift`+no+`" class="switch-input" type="checkbox" `+status+` value="`+array_shift[range_tanggal.indexOf(sekarang)]+`">
                            <span class="switch-slider" data-checked="SS" data-unchecked="NS"></span>
                          </label>
                        </td>
                        <td>`+label+`</td>
                      </tr>
                    `);
                  no++;
                })
              }
            })
            $('#get').attr('disabled', false);
            $('#get').html('Get');
        },
        error : function (error) {
          console.log('error '+error);
          alert('Tidak dapat mendapatkan data!');
          $('#get').attr('disabled', false);
          $('#get').html('Get');
        }
    });
  }
  $('#get').on('click', function (event) {
    if ($('#awal').val() == '' && $('#akhir').val() == '') {
      alert('Tanggal awal dan akhir tidak boleh kosong')
    }else{
      get_shifts();
    }
  });
  $('#set').on('click', function (event) {
    event.preventDefault();
    $('#set').attr('disabled', true);
    $('#set').html('<i class="fa fa-spin fa-spinner"></i> Seting...');
    var data_form = $('#shiftForm').serializeArray();
    data_form.push({
      name: "department",
      value: $('#department select').val()
    });
    $.ajax({
        url : "{{ URL::to('t-shift/set-shift') }}",
        type : 'POST',
        data : data_form,
        dataType: 'JSON',
        success : function (data) {
          if (data.success == '1') {
            $('#set').attr('disabled', false);
            $('#set').html('Set');
            get_shifts();
          }
        },
        error : function (error) {
          console.log(error);
          $('#set').attr('disabled', false);
          $('#set').html('Set');
        }
    })
  })

});

</script>
@endpush
