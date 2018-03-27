@extends('layouts.base')

@section('title')
    Report sample mie
@endsection

@section('breadcrumb')
    Report Sample Mie
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Report Sample Mie
                </div>
                <div class="card-body row">
                    <ul class="col-md-12">
                        <li class="form-group row">
                            <label class="col-form-label col-md-1">Tanggal </label>
                            <div id="tanggal_sample" class="col-md-4 input-group date" data-target-input="nearest">
                                <input name="tanggal_sample" placeholder="Tanggal Sample" class="form-control datetimepicker-input" type="text" data-target="#tanggal_sample" id="tanggal">
                                <div class="input-group-append" data-target="#tanggal_sample" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="col-md-1">
                                <button id="generate" type="button" class="btn btn-primary">Generate Report</button>
                            </div>
                        </li>
                    </ul>
                    <div class="col-md-12">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#sample-mie" role="tab" data-toggle="tab" aria-controls="sample-mie" class="nav-link active">Sample mie per tanggal : <span class="tanggal"></span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active show" id="minyak-line" role="tabpanel">
                                <table id="table-sample-mie" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="vertical-align: middle;" width="120">Variant</th>
                                            <th colspan="4" style="text-align: center;">FC</th>
                                            <th colspan="4" style="text-align: center;">KA</th>
                                        </tr>
                                        <tr style="text-align: center">
                                            <th width="120">Bobot Sample</th>
                                            <th width="100">Labu Awal</th>
                                            <th width="120">Labu Akhir</th>
                                            <th width="100">Nilai</th>
                                            <th width="120">Cawang Kosong</th>
                                            <th width="150">Cawan + Sample</th>
                                            <th width="120">Bobot Akhir</th>
                                            <th width="100">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
    $('#tanggal_sample').datetimepicker({
        locale:'id',
        format: 'D/MM/Y'
    });

    $(function () {
        $('#generate').click(function () {
            var tanggal = $('#tanggal').val();
            table = $('.table').DataTable( {
                "processing" : true,
                "ajax" : {
                  "url" : "sample-mie/generate_report",
                  "type" : "POST"
                }
            });
        })
    })
    </script>
@endpush
