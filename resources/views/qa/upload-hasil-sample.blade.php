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
                                <th rowspan="2" style="vertical-align: middle;" width="40">Action</th>
                            </tr>
                            <tr style="text-align: center">
                                <th width="120">Volume Titrasi</th>
                                <th width="70">Bobot</th>
                                <th width="120">Normalitas</th>
                                <th width="100">Nilai</th>
                                <th width="120">Volume Titrasi</th>
                                <th width="70">Bobot</th>
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
                var table_cell1 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="line_`+index+`" id="line_`+index+`" readonly class="form-control-plaintext" value="`+item.line_id+`" /></td>`;
                var table_cell2 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="tangki_`+index+`" id="tangki_`+index+`" readonly class="form-control-plaintext" value="`+item.tangki+`" /></td>`;
                var table_cell3 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="variant_product_`+index+`" id="variant_product_`+index+`" readonly class="form-control-plaintext" value="`+item.mid_product+`" /></td>`;
                var table_cell4 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="volume_titrasi_pv_`+index+`" id="volume_titrasi_pv_`+index+`" class="form-control" value="" /></td>`;
                var table_cell5 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="bobot_sample_pv_`+index+`" id="bobot_sample_pv_`+index+`" class="form-control" value="" /></td>`;
                var table_cell6 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="normalitas_pv_`+index+`" id="normalitas_pv_`+index+`" class="form-control" value="" /></td>`;
                var table_cell7 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="nilai_pv_`+index+`" id="nilai_pv_`+index+`" class="form-control" value="" /></td>`;
                var table_cell8 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="volume_titrasi_ffa_`+index+`" id="volume_titrasi_ffa_`+index+`" class="form-control" value="" /></td>`;
                var table_cell9 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="bobot_sample_ffa_`+index+`" id="bobot_sample_ffa_`+index+`" class="form-control" value="" /></td>`;
                var table_cell10 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="normalitas_ffa_`+index+`" id="normalitas_ffa_`+index+`" class="form-control" value="" /></td>`;
                var table_cell11 = `<td><input onkeyup="return AllowNumbersOnly(event, `+index+`)" type="text" name="nilai_ffa_`+index+`" id="nilai_ffa_`+index+`" class="form-control" value="" /></td>`;
                var table_cell12 = `<td class="green text-center"><a href="javascript:;" onClick="saveOne(`+index+`)" title="save sample `+item.id+`"><i class="fa fa-save"></i></a></td>`;
                table_row.append(table_cell1,table_cell2,table_cell3,table_cell4,table_cell5,table_cell6,table_cell7,table_cell8,table_cell9,table_cell10,table_cell11, table_cell12);
                sample_table.append(table_row);
            });
        },
        error: function (error) {
            console.log(error)
        }
    });
    function AllowNumbersOnly(e, index) {
      // Memastikan hanya angka dan titik yang diinput user.
      var code = (e.which) ? e.which : e.keyCode;
      if ( ( code != 46 && (code > 31 && (code < 48 || code > 57)) ) && e.ctrlKey == false  ) {
          e.preventDefault();
      }
      setTimeout(nilai(index), 200);
    }
    function nilai(index)
    {
        // Jika di enter
        var volume_titrasi_pv = $('#volume_titrasi_pv_'+index).val();
        var bobot_sample_pv = $('#bobot_sample_pv_'+index).val();
        var normalitas_pv = $('#normalitas_pv_'+index).val();
        var volume_titrasi_ffa = $('#volume_titrasi_ffa_'+index).val();
        var bobot_sample_ffa = $('#bobot_sample_ffa_'+index).val();
        var normalitas_ffa = $('#normalitas_ffa_'+index).val();
        var nilai_pv = ( (volume_titrasi_pv*normalitas_pv*1000)/bobot_sample_pv ).toFixed(2);
        var nilai_ffa = ( (volume_titrasi_ffa*normalitas_ffa*25.6)/bobot_sample_ffa ).toFixed(4);
        $('#nilai_pv_'+index).val(nilai_pv);
        $('#nilai_ffa_'+index).val(nilai_ffa);
    }
</script>
@endpush
