@extends('layouts.base')

@section('title')
    Report Sample Mie
@endsection

@section('breadcrumb')
    Sample Mie
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="alert">
            </div>
            <div class="card">
                <div class="card-header">
                    Report Sample Mie
                </div>
                <div class="card-body row">
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
                        <table class="table table-bordered table-striped table-report table-hover" width="100%">
                            <thead>
                            <tr>
                                <th class="text-center" rowspan="2">No</th>
                                <th class="text-center" rowspan="2">ID Sample</th>
                                <!-- <th>
                                    <select class="form-control" name="">
                                        <option value=""></option>
                                    </select>
                                </th> -->
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
                                        <option value="null"> <span>&#xf0b0;<span> </option>
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
                                    <select style="font-family: fontAwesome" id='filter-variant' class="form-control" name="">
                                        <option value="null"> <span>&#xf0b0;<span> </option>
                                        @foreach ($variants as $variant)
                                            <option value="{{ $variant->mid }}">{{ $variant->name }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th>
                                    <select style="font-family: fontAwesome" id='filter-status' class="form-control" name="">
                                        <option value="null"> <span>&#xf0b0;<span> </option>
                                        <option value="1">Created</option>
                                        <option value="2">Uploaded</option>
                                        <option value="3">Approved</option>
                                    </select>
                                </th>
                                <th @if (in_array('full_report_noodle', $permissions)) colspan="4" @endif style="text-align: center;">FC</th>
                                <th @if (in_array('full_report_noodle', $permissions)) colspan="4" @endif style="text-align: center;">KA</th>
                            </tr>
                            <tr style="text-align: center; cursor: pointer">
                                <th style="vertical-align: middle;">Dept</th>
                                <th style="vertical-align: middle;">Line</th>
                                <th style="vertical-align: middle;">Shift</th>
                                <th style="vertical-align: middle;">Variant</th>
                                <th style="vertical-align: middle;">Status</th>
                                @if (in_array('full_report_noodle', $permissions))
                                <th>B</th>
                                <th>LA</th>
                                <th>LI</th>
                                @endif
                                <th>Nilai</th>
                                @if (in_array('full_report_noodle', $permissions))
                                <th>BC 0</th>
                                <th>BC 1</th>
                                <th>BC 2</th>
                                @endif
                                <th>Nilai</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="avg col-sm-12 row" style="padding-top: 20px">
                        <div class="col-sm-2">
                            <a id="link-download-excel" href="" class="btn btn-sm btn-outline-success">
                                <i class="fa fa-file-excel-o"></i> Download Excel
                            </a>
                        </div>
                        <div class="col-sm-1 col-form-label text-right">Avg FC :</div>
                        <div class="col-sm-2">
                            <input readonly="" type="text" class="form-control avg-fc">
                        </div>
                        <div class="col-sm-1 col-form-label text-right">Avg KA :</div>
                        <div class="col-sm-2">
                            <input readonly="" type="text" class="form-control avg-ka">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <h4>Keterangan :</h4>
                        <ul>
                          <li>LI = Labu Isi</li>
                          <li>LA = Labu Awal</li>
                          <li>B = Bobot Sample</li>
                          <li>BC 0 = Bobot Cawan 0</li>
                          <li>BC 1 = Bobot Cawan 1</li>
                          <li>BC 2 = Bobot Cawan 2</li>
                        </ul>
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
            var start_time = $('#start_time input').val();
            var end_time = $('#end_time input').val();
            var variant = $('#filter-variant').val();
            var shift = $('#filter-shift').val();
            $('#link-download-excel').attr('href', "{{ URL::to('sample-mie/report-sample/excel')}}/"+department+"/"+status+"/"+line+"/"+variant+"/"+start_time+"/"+end_time+"/"+shift);
            table = $('.table').DataTable( {
                "ajax" : {
                    "url" : "{{ URL::to('sample-mie/report-sample/data')}}/"+department+"/"+status+"/"+line+"/"+variant+"/"+start_time+"/"+end_time+"/"+shift,
                    "type" : "GET"
                }
            });
            $.ajax({
                url : "{{ URL::to('sample-mie/report-sample/average')}}/"+department+"/"+status+"/"+line+"/"+variant+"/"+start_time+"/"+end_time+"/"+shift,
                type : "GET",
                dataType : 'JSON',
                success: function (response) {
                    $('.avg-fc').val('');
                    $('.avg-ka').val('');
                    $('.avg-fc').val((response.avg_fc).toFixed(2));
                    $('.avg-ka').val((response.avg_ka).toFixed(4));
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
                  line.append(`<option value="null"> <span>&#xf0b0;<span> </option>`);
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
    });
    </script>
@endpush
