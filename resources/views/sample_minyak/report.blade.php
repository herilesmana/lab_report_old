@extends('layouts.base')

@section('title')
    Report Sample Minyak
@endsection

@section('breadcrumb')
    Sample Minyak
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="alert">
            </div>
            <div class="card">
                <div class="card-header">
                    Report Sample Minyak
                </div>
                <div class="card-body row">
                    <div class="col-md-12">
                        <div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                  <select id='filter-department' class="form-control" name="">
                                      <option value="null"> ---- </option>
                                      @foreach ($departments as $department)
                                          <option value="{{ $department->id }}">{{ $department->name }}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-report table-hover">
                            <thead>
                              <tr>
                                  <th>
                                      <select class="form-control" name="">
                                          <option value=""></option>
                                      </select>
                                  </th>
                                  <th>
                                      <select id='filter-status' class="form-control" name="">
                                          <option value="null"></option>
                                          <option value="1">Created</option>
                                          <option value="2">Uploaded</option>
                                          <option value="3">Approved</option>
                                      </select>
                                  </th>
                                  <th>
                                      <select id='filter-line' class="form-control" name="">
                                          <option value="null"><i class="fa fa-filter"></i></option>
                                      </select>
                                  </th>
                                  <th>
                                      <select id='filter-tangki' class="form-control" name="">
                                          <option value="null"><i class="fa fa-filter"></i></option>
                                          <option value="BB">BB</option>
                                          <option value="BKA">BK A</option>
                                          <option value="BKB">BK B</option>
                                          <option value="MP">MP</option>
                                      </select>
                                  </th>
                                  <th colspan="4" style="text-align: center;">PV</th>
                                  <th colspan="4" style="text-align: center;">FFA</th>
                              </tr>
                              <tr style="text-align: center; cursor: pointer">
                                  <th style="vertical-align: middle;" width="160">Sample Id</th>
                                  <th style="vertical-align: middle;" width="100">Status</th>
                                  <th style="vertical-align: middle;" width="150">Line</th>
                                  <th style="vertical-align: middle;" width="80">Tangki</th>
                                  <th width="150">Volume Titrasi</th>
                                  <th width="110">Bobot</th>
                                  <th width="100">Normalitas</th>
                                  <th width="100">Nilai</th>
                                  <th width="150">Volume Titrasi</th>
                                  <th width="110">Bobot</th>
                                  <th width="120">Normalitas</th>
                                  <th width="120">Nilai</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                  <td colspan="12"><a class="link-download-excel" href="" class="btn btn-sm btn-outline-success"><i class="fa fa-file-excel-o"></i> Download Excel</a></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
    var table;
    $(function() {
        get_data();
        function get_data()
        {
            var department = $('#filter-department').val();
            var line = $('#filter-line').val();
            var status = $('#filter-status').val();
            var tangki = $('#filter-tangki').val();
            table = $('.table').DataTable( {
                "ajax" : {
                    "url" : "{{ URL::to('sample-minyak/report-sample/data')}}/"+department+"/"+status+"/"+line+"/"+tangki,
                    "type" : "GET"
                }
            });
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
                  $.each(response, (index, item) => {
                      var option1 = `<option value="null"></option>`;
                      var option2 = `<option value="`+item.id+`">`+item.id+`</option>`;
                      line.append(option1, option2);
                  });
                },
                error : function (error) {
                    console.log(error);
                }
            })
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
    });
    </script>
@endpush
