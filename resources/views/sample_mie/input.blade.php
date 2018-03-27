@extends('layouts.base')

@section('title')
    Input sample mie
@endsection

@section('breadcrumb')
    Input Sample Mie
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
          @if(isset($_GET['alert']))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sample telah dibuat!</strong> id : @php echo $_GET['semua_id']; @endphp
            </div>
          @endif
            <div class="card">
                <div class="card-header">
                    Input Sample Mie
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
                            <label class="col-form-label col-md-1">Shift </label>
                            <div class="col-md-4 input-group date" data-target-input="nearest">
                                <select id="shift" class="form-control" name="shift">
                                    <option value="">-- Pilih Shift --</option>
                                    @foreach ($shift as $data)
                                        <option value="{{ $data->name }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback"></span>
                            </div>
                        </li>
                        <li class="form-group row">
                            <label class="col-form-label col-md-1">Department </label>
                            <div id="department" class="col-md-4 input-group date" data-target-input="nearest">
                                <select class="form-control" name="department" id="dept">
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
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#sample-mie" role="tab" data-toggle="tab" aria-controls="minyak-line" class="nav-link active">Sample mie per variant</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active show" id="minyak-line" role="tabpanel">
                                <div id="minyak-proses" class="custom-file col-md-4">
                                    <input id="pilih-sample-mie" type="file" class="custom-file-input" name="sample_mie">
                                    <label for="pilih-sample-mie" class="custom-file-label">Hasil Sample Mie</label>
                                </div>
                                <hr>
                                <span class="waiting-sample-mie" style="display: none"><i class="fa fa-spinner fa-spin"></i> Uploading...</span>
                                <form action="" id="SampleMieForm" method="post">
                                  @csrf
                                <table id="table-sample-mie" style="display:none" class="table table-bordered">
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
                                    <tfoot>
                                        <tr>
                                            <td colspan="11">
                                                <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                </form>
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
    @include('sample_mie.sample-mie-script')
    </script>
@endpush
