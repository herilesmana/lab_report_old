@extends('layouts.base')

@section('title')
    Input sample minyak
@endsection

@section('content')
@include('sample_minyak.form-minyak', ['sample' => 'proses'])
@include('sample_minyak.form-minyak', ['sample' => 'bb'])
@include('sample_minyak.form-minyak', ['sample' => 'bk'])
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
                    <div class="col-md-4">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="proses" role="tabpanel">
                                <div id="minyak-proses" class="custom-file">
                                    <input id="pilih-minyak-proses" type="file" class="custom-file-input" name="minyak_proses">
                                    <label for="pilih-minyak-proses" class="custom-file-label">Minyak Proses</label>
                                </div>
                                <span class="waiting-minyak-proses" style="display: none"><i class="fa fa-spinner fa-spin"></i> Uploading...</span>
                                <table id="table-minyak-proses" style="display:none" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Line</th>
                                            <th>PV</th>
                                            <th>FFA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-outline-primary">Simpan</button>
                                                <button class="btn btn-outline-success" onClick="show_modal_minyak_proses()">Detail</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="bk" role="tabpanel">
                                <div id="minyak-bk" class="custom-file">
                                    <input id="pilih-minyak-bk" type="file" class="custom-file-input" name="minyak_bk">
                                    <label for="pilih-minyak-bk" class="custom-file-label">Minyak BK</label>
                                </div>
                                <span class="waiting-minyak-proses" style="display: none"><i class="fa fa-spinner fa-spin"></i> Uploading...</span>
                                <table id="table-minyak-proses" style="display:none" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Line</th>
                                            <th>PV</th>
                                            <th>FFA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-outline-primary">Simpan</button>
                                                <button class="btn btn-outline-success">Detail</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="bb" role="tabpanel">
                                <div id="minyak-bb" class="custom-file">
                                    <input id="pilih-minyak-bb" type="file" class="custom-file-input" name="minyak_bb">
                                    <label for="pilih-minyak-bb" class="custom-file-label">Minyak BB</label>
                                </div>
                                <span class="waiting-minyak-proses" style="display: none"><i class="fa fa-spinner fa-spin"></i> Uploading...</span>
                                <table id="table-minyak-proses" style="display:none" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Line</th>
                                            <th>PV</th>
                                            <th>FFA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-outline-primary">Simpan</button>
                                                <button class="btn btn-outline-success">Detail</button>
                                            </td>
                                        </tr>
                                    </tfoot>
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
