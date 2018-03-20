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
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#proses" role="tab" aria-controls="proses" aria-selected="true">Minyak Proses & BK</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#bekas" role="tab" aria-controls="proses" aria-selected="true">Minyak Proses & BK</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#baru" role="tab" aria-controls="baru" aria-selected="false">Minyak Baru</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active show" id="proses" role="tabpanel">
                                <div id="minyak-proses" class="custom-file col-md-3">
                                    <input id="pilih-minyak-proses" type="file" class="custom-file-input" name="minyak_proses">
                                    <label for="pilih-minyak-proses" class="custom-file-label">Minyak Proses</label>
                                </div>
                                <div id="minyak-bk" class="custom-file col-md-3">
                                    <input id="minyak-bk" type="file" class="custom-file-input" name="minyak_bk">
                                    <label for="minyak-bk" class="custom-file-label">Minyak BK</label>
                                </div>

                            </div>
                            <div class="tab-pane" id="baru" role="tabpanel">
                                <input type="file" name="" value=""> Input minyak baru
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
    $(function() {
        $('#pilih-minyak-proses').change(function() {
            var form_data = new FormData();
            var minyak_proses = $(this).prop('files')[0];
            form_data.append('minyak_proses', minyak_proses);
            form_data.append('_token', "{{ csrf_token() }}");
            $.ajax({
                type: 'POST',
                url: "{{ route('sample.minyak.upload') }}",
                data : form_data,
                contentType: false,
                cache: false,
                processData: false,
                success : function(response) {
                  $('#minyak-proses').html(`
                      <button class="btn btn-primary" type="button" title="Nama file nya adalah.xlsx">Nama File...</button>
                      <button class="btn btn-default" type="button">Ganti file</button>
                      <span></span>
                  `);
                },
                error : function(error) {
                    console.log(error)
                }
            });
        })
    })
    </script>
@endpush
