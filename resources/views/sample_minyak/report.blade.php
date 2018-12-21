@extends('layouts.base')

@section('title')
    Report Sample Minyak
@endsection

@section('breadcrumb')
    Sample Minyak
@endsection

@push('styles')

@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="alert">
            </div>
            <div class="card">
                <div class="card-header">
                    Report Sample Minyak
                </div>
                <div class="card-body form-group row">
                    <div class="col-md-12">
                        <div>
                            <div class="form-group row">
                                <div id="start_time" class="col-md-2 input-group date" data-target-input="nearest">
                                    <input name="start_time" placeholder="Tanggal Awal" class="form-control datetimepicker-input" type="text" data-target="#start_time" id="start">
                                    <div class="input-group-append" data-target="#start_time" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                                <div id="end_time" class="col-md-2 input-group date" data-target-input="nearest">
                                    <input name="end_time" placeholder="Tanggal Akhir" class="form-control datetimepicker-input" type="text" data-target="#end_time" id="start">
                                    <div class="input-group-append" data-target="#end_time" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <span class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-report table-hover">
                            <thead>
                            <tr>
                                <th width="40" class="text-center" rowspan="2">No</th>
                                <th width="120" class="text-center" rowspan="2">ID Sample</th>
                                <th>
                                    <select style="font-family: fontAwesome" id='filter-department' class="form-control" name="">
                                        <option value="null"> <span>&#xf0b0;<span> </option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th>
                                    <select style="font-family: fontAwesome" id='filter-line' class="form-control" name="">
                                        <option value="null">&#xf0b0;</option>
                                    </select>
                                </th>
                                <th>
                                    <select style="font-family: fontAwesome" id='filter-shift' class="form-control" name="">
                                        <option value="null"> <span>&#xf0b0;<span> </option>
                                        @foreach ($shifts as $shift)
                                            <option value="{{ $shift->name }}">{{ $shift->name }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th>
                                    <select style="font-family: fontAwesome" id='filter-jam' class="form-control" name="">
                                        <option value="null"> <span>&#xf0b0;<span> </option>
                                        <!-- @foreach (['22:30:00','21:00:00','19:30:00','18:00:00','16:30:00','15:00:00','13:30:00','12:00:00','10:30:00','09:00:00','07:30:00','06:00:00','04:30:00','03:00:00','01:30:00','00:00:00'] as $jam)
                                            <option value="{{ $jam }}">{{ $jam }}</option>
                                        @endforeach -->
                                    </select>
                                </th>
                                <th>
                                    <select style="font-family: fontAwesome" id='filter-tangki' class="form-control" name="">
                                        <option value="null"><span>&#xf0b0;<span></option>
                                        <option value="BB">BB</option>
                                        <option value="BKA">BK A</option>
                                        <option value="BKB">BK B</option>
                                        <option value="MP">MP</option>
                                    </select>
                                </th>
                                <th>
                                    <select style="font-family: fontAwesome" id='filter-variant' class="form-control" name="">
                                        <option value="null"><span>&#xf0b0;<span></option>
                                        @foreach ($variants as $variant)
                                            <option value="{{ $variant->mid }}">{{ $variant->name }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th>
                                    <select style="font-family: fontAwesome" id='filter-status' class="form-control" name="">
                                        <option value="null"><span>&#xf0b0;<span></option>
                                        <option value="1">Created</option>
                                        <option value="2">Uploaded</option>
                                        <option value="3">Approved</option>
                                    </select>
                                </th>
                                <th @if (in_array('full_report_noodle', $permissions)) colspan="4" @endif style="text-align: center;">PV</th>
                                <th @if (in_array('full_report_noodle', $permissions)) colspan="4" @endif style="text-align: center;">FFA</th>
                            </tr>
                            <tr style="text-align: center; cursor: pointer">
                                <th style="vertical-align: middle;" width="75">Dept</th>
                                <th style="vertical-align: middle;" width="100">Line</th>
                                <th style="vertical-align: middle;" width="60">Shift</th>
                                <th style="vertical-align: middle;" width="80">Time</th>
                                <th style="vertical-align: middle;" width="30">Tangki</th>
                                <th style="vertical-align: middle;" width="50">Variant</th>
                                <th style="vertical-align: middle;" width="50">Status</th>
                                @if (in_array('full_report_noodle', $permissions))
                                <th width="110">Bobot</th>
                                <th width="150">Volume Titrasi</th>
                                <th width="100">Normalitas</th>
                                @endif
                                <th width="100">Nilai</th>
                                @if (in_array('full_report_noodle', $permissions))
                                <th width="110">Bobot</th>
                                <th width="150">Volume Titrasi</th>
                                <th width="120">Normalitas</th>
                                @endif
                                <th width="120">Nilai</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                <td colspan="@if (in_array('full_report_noodle', $permissions)) 16 @else 10 @endif">
                                    <a id="link-download-excel" href="" class="btn btn-sm btn-outline-success">
                                    <i class="fa fa-file-excel-o"></i> Download Excel
                                    </a>
                                </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="avg col-sm-12 row" style="padding-top: 20px">
                      <div class="col-sm-1 col-form-label">Avg PV :</div>
                      <div class="col-sm-2">
                        <input readonly="" type="text" class="form-control avg-pv">
                      </div>
                      <div class="col-sm-1 col-form-label">Avg FFA :</div>
                      <div class="col-sm-2">
                        <input readonly="" type="text" class="form-control avg-ffa">
                      </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
    $('#start_time').datetimepicker({
        locale:'id',
        format: 'Y-MM-D'
    })
    $('#start_time input').val("{{ date('Y-m-d') }}");
    $('#end_time').datetimepicker({
        locale:'id',
        format: 'Y-MM-D'
    });
    $('#end_time input').val("{{ date('Y-m-d') }}");
    var table;
    $(function() {
      $('#start_time').on('change.datetimepicker', function () {
        table.destroy();
          get_data();
      })
      $('#end_time').on('change.datetimepicker', function () {
        table.destroy();
          get_data();
      })
        get_data();
        function get_data()
        {
            var department = $('#filter-department').val();
            var line = $('#filter-line').val();
            var status = $('#filter-status').val();
            var tangki = $('#filter-tangki').val();
            var variant = $('#filter-variant').val();
            var shift = $('#filter-shift').val();
            var jam = $('#filter-jam').val();
            var start_time = $('#start_time input').val();
            var end_time = $('#end_time input').val();
            $('#link-download-excel').attr('href', "{{ URL::to('sample-minyak/report-sample/excel')}}/"+department+"/"+status+"/"+line+"/"+tangki+"/"+start_time+"/"+end_time+"/"+variant+"/"+shift+"/"+jam);
            table = $('.table').DataTable({
                "ajax" : {
                    "url" : "{{ URL::to('sample-minyak/report-sample/data')}}/"+department+"/"+status+"/"+line+"/"+tangki+"/"+start_time+"/"+end_time+"/"+variant+"/"+shift+"/"+jam,
                    "type" : "GET"
                },
                "scrollX": true,
            });
            $.ajax({
                url : "{{ URL::to('sample-minyak/report-sample/average')}}/"+department+"/"+status+"/"+line+"/"+tangki+"/"+start_time+"/"+end_time+"/"+variant+"/"+shift+"/"+jam,
                type : "GET",
                dataType : 'JSON',
                success: function (response) {
                    $('.avg-pv').val('');
                    $('.avg-ffa').val('');
                    $('.avg-pv').val((response.avg_pv).toFixed(2));
                    $('.avg-ffa').val((response.avg_ffa).toFixed(4));
                    console.log(response)
                },
                error : function (error) {
                    console.log(error);
                }
            })
            $('.dataTables_wrapper').removeClass('container-fluid');
            $('.table').removeAttr('style');
        }
        $('#filter-department').on('change', () => {
            table.destroy();
            get_data();
            var line = $('#filter-line');
            $('#filter-line').html('');
            $.ajax({
                url : "{{ URL::to('line/per_department')}}/"+$('#filter-department').val(),
                type : "GET",
                dataType : 'JSON',
                success: function (response) {
                  line.append(`<option value="null">&#xf0b0;</option>`);
                  $.each(response, (index, item) => {
                      var option1 = `<option value="`+item.id+`">`+item.id+`</option>`;
                      line.append(option1);
                  });
                },
                error : function (error) {
                    console.log(error);
                }
            })
        })
        $('#generate button').on('click', function() {
          table.destroy();
          get_data();
        })
        $('#filter-line').on('change', () => {
            table.destroy();
            get_data();
        })
        $('#filter-status').on('change', () => {
            table.destroy();
            get_data();
        })
        $('#filter-tangki').on('change', () => {
            table.destroy();
            get_data();
        })
        $('#filter-variant').on('change', () => {
            table.destroy();
            get_data();
        })
        $('#filter-shift').on('change', () => {
            table.destroy();
            get_data();
        })
        $('#filter-jam').on('change', () => {
            table.destroy();
            get_data();
        })
    });
    </script>
@endpush
