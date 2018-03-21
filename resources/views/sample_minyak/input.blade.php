@extends('layouts.base')

@section('title')
    Input sample minyak
@endsection

@section('content')
@include('sample_minyak.form-minyak-proses')
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
                                <table id="table-minyak-proses" class="table table-hover">
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
                                <table id="table-minyak-proses" class="table table-hover">
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
                                <table id="table-minyak-proses" class="table table-hover">
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
                  console.log(response);
                  // $('#minyak-proses').html(`
                  //     <button class="btn btn-primary" type="button" title="Nama file nya adalah.xlsx">Nama File...</button>
                  //     <button class="btn btn-default" type="button">Ganti file</button>
                  //     <span></span>
                  // `);
                  var table_obj = $('#table-minyak-proses');
                  $('#table-minyak-proses tbody tr').remove();
                  $.each(response, function(index, item) {
                      var table_row = $('<tr>', {});
                      var table_cell1 = $('<td>', {html: item.line});
                      var table_cell2 = $('<td>', {html: item.bobot_pv});
                      var table_cell3 = $('<td>', {html: item.bobot_ffa});
                      table_row.append(table_cell1,table_cell2,table_cell3);
                      table_obj.append(table_row);
                  });
                },
                error : function(error) {
                    console.log(error)
                }
            });
        })
    })
    function show_modal_minyak_proses()
    {
        $("#form-minyak-proses").modal('show');
    }
    </script>
@endpush
