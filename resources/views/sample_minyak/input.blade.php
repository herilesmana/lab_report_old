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
                <div class="card-body">
                    <ul>
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
                            <div id="tanggal_sample" class="col-md-4 input-group date" data-target-input="nearest">
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
                            <label class="col-form-label col-md-1">Jam </label>
                            <div id="tanggal_sample" class="col-md-4 input-group date" data-target-input="nearest">
                                <select class="form-control" name="jam_sample">
                                    <option value="">-- Jam Sample --</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback"></span>
                            </div>
                        </li>
                    </ul>
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
    </script>
@endpush
