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
                        <div class="container-fluid">
                            <div class="form-group row">
                                <div class="col-md-2">
                                  <select id='filter-department' class="form-control" name="">
                                      <option ""> ---- </option>
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
                                          <option value=""></option>
                                          <option value="">Created</option>
                                          <option value="">Uploaded</option>
                                          <option value="">Approved</option>
                                      </select>
                                  </th>
                                  <th>
                                      <select id='filter-line' class="form-control" name="">
                                          <option value=""><i class="fa fa-filter"></i></option>
                                      </select>
                                  </th>
                                  <th>
                                      <select id='filter-tangki' class="form-control" name="">
                                          <option value=""><i class="fa fa-filter"></i></option>
                                          <option value="">BB</option>
                                          <option value="">BK A</option>
                                          <option value="">BK B</option>
                                          <option value="">MP</option>
                                      </select>
                                  </th>
                                  <th colspan="4" style="text-align: center;">PV</th>
                                  <th colspan="4" style="text-align: center;">FFA</th>
                              </tr>
                              <tr style="text-align: center; cursor: pointer">
                                  <th style="vertical-align: middle;" width="100">Sample Id</th>
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

            table = $('.table').DataTable( {
                "ajax" : {
                    "url" : "{{ route('sample.minyak.report.data') }}",
                    "type" : "GET"
                }
            });
        }
        $('#filter-department').on('change', () => {
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
    });
    </script>
@endpush
