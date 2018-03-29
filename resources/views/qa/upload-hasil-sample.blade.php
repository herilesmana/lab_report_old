@extends('layouts.base')

@section('title')
    Upload Hasil Sample
@endsection

@section('breadcrumb')
    Upload Hasil Sample
@endsection

@section('content')
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-header">
  			     Upload Hasil Sample
  			</div>
  			<div class="card-body">
    				<div class="container-fluid">
                <div class="form-group row">
                  <div class="col-md-12">
                      <table class="table table-bordered editable" id="sample-id">
                          <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align: middle;">Line</th>
                                <th rowspan="2" style="vertical-align: middle;" width="20">Tangki</th>
                                <th rowspan="2" style="vertical-align: middle;" width="40">Variant</th>
                                <th colspan="4" style="text-align: center;">PV</th>
                                <th colspan="4" style="text-align: center;">FFA</th>
                            </tr>
                            <tr style="text-align: center">
                                <th width="120">Volume Titrasi</th>
                                <th width="110">Bobot</th>
                                <th width="120">Normalitas</th>
                                <th width="100">Nilai</th>
                                <th width="120">Volume Titrasi</th>
                                <th width="110">Bobot</th>
                                <th width="120">Normalitas</th>
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
    $.ajax({
        url: "{{ URL::to('sample-minyak') }}/1",
        type: "GET",
        dataType: "JSON",
        success: function (response) {
            var sample_table = $('#sample-id');
            $.each(response, (index, item) => {
                var table_row = $('<tr>', {});
                var table_cell1 = `<td><input type="text" name="line_`+index+`" class="form-control" value="`+item.line_id+`" /></td>`;
                var table_cell2 = `<td><input type="text" name="tangki_`+index+`" class="form-control" value="`+item.tangki+`" /></td>`;
                table_row.append(table_cell1,table_cell2);
                sample_table.append(table_row);
            });
        },
        error: function (error) {
            console.log(error)
        }
    })
</script>
@endpush
