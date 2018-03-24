@extends('layouts.base')

@section('title')
    Input sample minyak
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Input Sample Minyak
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
                        </li>
                        <li class="form-group row">
                            <label class="col-form-label col-md-1">Jam </label>
                            <div id="jam_sample" class="col-md-4 input-group date" data-target-input="nearest">
                                <select class="form-control" name="jam_sample">
                                    <option value="">-- Jam Sample --</option>
                                    @foreach ($jam_sample as $jam)
                                        <option value="{{ $jam->id }}">{{ $jam->jam_sample }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback"></span>
                            </div>
                        </li>
                        <li class="form-group row">
                            <label class="col-form-label col-md-1">Department </label>
                            <div id="department" class="col-md-4 input-group date" data-target-input="nearest">
                                <select class="form-control" name="jam_sample">
                                    <option value="">-- Pilih Department --</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback"></span>
                            </div>
                        </li>
                    </ul>
                    <div class="col-md-12">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="proses" role="tabpanel">
                                <div id="minyak-proses" class="custom-file col-md-4">
                                    <input id="pilih-minyak-proses" type="file" class="custom-file-input" name="minyak_proses">
                                    <label for="pilih-minyak-proses" class="custom-file-label">Minyak Proses</label>
                                </div>
                                <hr>
                                <span class="waiting-minyak-proses" style="display: none"><i class="fa fa-spinner fa-spin"></i> Uploading...</span>
                                <table id="table-minyak-proses" style="display:none" class="table table-bordered">
                                  <form action="" id="inputForm" method="post">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="vertical-align: middle;">Line</th>
                                            <th rowspan="2" style="vertical-align: middle;">Tangki</th>
                                            <th rowspan="2" style="vertical-align: middle;">Variant</th>
                                            <th colspan="4" style="text-align: center;">PV</th>
                                            <th colspan="4" style="text-align: center;">FFA</th>
                                        </tr>
                                        <tr style="text-align: center">
                                            <th width="120">Volume Titrasi</th>
                                            <th width="120">Bobot Sample</th>
                                            <th width="120">Normalitas</th>
                                            <th width="100">Nilai</th>
                                            <th width="120">Volume Titrasi</th>
                                            <th width="120">Bobot Sample</th>
                                            <th width="120">Normalitas</th>
                                            <th width="100">Nilai</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="11">
                                                <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                  </form>
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
@include('sample_minyak.sample-minyak-proses-script')
    </script>
@endpush
